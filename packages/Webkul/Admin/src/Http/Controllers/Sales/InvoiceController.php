<?php

namespace Webkul\Admin\Http\Controllers\Sales;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Sales\Repositories\OrderRepository as Order;
use Webkul\Sales\Repositories\InvoiceRepository as Invoice;
use PDF;

/**
 * Sales Invoice controller
 *
 * @author    Jitendra Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_config;

    /**
     * OrderRepository object
     *
     * @var array
     */
    protected $order;

    /**
     * InvoiceRepository object
     *
     * @var array
     */
    protected $invoice;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Sales\Repositories\OrderRepository   $order
     * @param  \Webkul\Sales\Repositories\InvoiceRepository $invoice
     * @return void
     */
    public function __construct(Invoice $invoice, Order $order)
    {
        $this->middleware('admin');

        $this->_config = request('_config');

        $this->order = $order;

        $this->invoice = $invoice;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->_config['view']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $orderId
     * @return \Illuminate\Http\Response
     */
    public function create($orderId)
    {
        $order = $this->order->findOrFail($orderId);

        return view($this->_config['view'], compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param int $orderId
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $orderId)
    {
        $order = $this->order->findOrFail($orderId);

        if (! $order->canInvoice()) {
            session()->flash('error', trans('admin::app.sales.invoices.creation-error'));

            return redirect()->back();
        }

        $this->validate(request(), [
            'invoice.items.*' => 'required|numeric|min:0',
        ]);

        $data = request()->all();

        $haveProductToInvoice = false;
        foreach ($data['invoice']['items'] as $itemId => $qty) {
            if ($qty) {
                $haveProductToInvoice = true;
                break;
            }
        }

        if (! $haveProductToInvoice) {
            session()->flash('error', trans('admin::app.sales.invoices.product-error'));

            return redirect()->back();
        }

        $this->invoice->create(array_merge($data, ['order_id' => $orderId]));

        session()->flash('success', trans('admin::app.response.create-success', ['name' => 'Invoice']));

        return redirect()->route($this->_config['redirect'], $orderId);
    }

    /**
     * Show the view for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $invoice = $this->invoice->findOrFail($id);

        return view($this->_config['view'], compact('invoice'));
    }

    /**
     * Print and download the for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $invoice = $this->invoice->findOrFail($id);

        $pdf = PDF::loadView('admin::sales.invoices.pdf', compact('invoice'))->setPaper('a4');

        return $pdf->download('invoice-' . $invoice->created_at->format('d-m-Y') . '.pdf');
    }

    public function generateDocument($id)
    {
        $invoice = $this->invoice->findOrFail($id);

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $phpWord->getSettings()->setHideGrammaticalErrors(true);
        $phpWord->getSettings()->setHideSpellingErrors(true);
        $phpWord->setDefaultFontName('Arial');
        $sectionStyle = array(
            'orientation'=>'portrait',
            'marginTop'=>0,
            'marginBottom'=>0,
            'footerHeight'=>0,
            'headerHeight'=>0,
        );
        $section = $phpWord->addSection($sectionStyle);
        $header = $section->addHeader();
        $header->addImage('images/factura_header.png',
            array(
                'width'=>600,
                'height'=>72,
                'marginLeft' => -75,
                'positioning'=>'absolute',
                'wrappingStyle'=> 'behind',
                'posHorizontal' => 'absolute',
                'posVertical' => 'absolute',
            ));

        $table1 = $section->addTable();
        $table1->addRow();
        $table1->addCell(5500)->addImage('images/factura_logo.png',
            array(
                'width'=>205,
                'height'=>117,
                'positioning'=>'relative',
                'wrappingStyle'=> 'infront',
                'marginTop'=>283,
                'marginLeft'=>500
            ));
        $table1->addRow();
        $table1->addCell(5500);
        $table1->addRow();
        $table1->addCell(5500);
        $table1->addCell()->addText('Factura', array(
            'bold' => true,
            'color'=> '92D050',
            'size' => 36,
        ));
        $table1->addRow();
        $table1->addCell();
        $table1->addRow();
        $table1->addCell(5500)->addText('Venta de plántulas y árboles de Paulownia',
            array(
                'bold' => true,
                'color'=> '92D050',
                'size' => 12,
            ));
        $fecha = 'Fecha:25/07/2019 <w:br/>№ 2019_07130';
        $table1->addCell()->addText($fecha,
            array(
                'bold' => true,
                'size' => 12,
            ));

        $textAddress1 = 'PAULOWNIA PROFESSIONAL S.L. <w:br/>C.I.F/N.I.F: B44276491 
                        <w:br/>Camino Estanca S/N. Apdo. 50 
                        <w:br/>Alcañiz (Teruel) 44600 
                        <w:br/>M. (+34) 642787555';

        $textAddress2 = 'M. Angeles Rodao de Diego <w:br/>D.N.I: 3452945R 
                         <w:br/>C/Fernandez Caro 74 2A <w:br/>28027 Madrid 
                         <w:br/>(Madrid) <w:br/>M. (+34) 684208802';

        $textEmail1 = 'info@paulownia.pro';
        $textEmail2 = 'angelesrodao@gmail.com';
        $table1->addRow();
        $table1->addCell(5500)->addText($textAddress1, array('bold' => true, 'size' => 12,));
        $table1->addCell()->addText($textAddress2, array('bold' => true, 'size' => 12,));
        $table1->addRow();
        $table1->addCell(5500)->addText($textEmail1, array('bold' => true, 'size' => 12,
            'color'=> '0000FF', 'underline'=>'single'));
        $table1->addCell()->addText($textEmail2, array('bold' => true, 'size' => 12,
            'color'=> '0000FF', 'underline'=>'single'));

        $section->addTextBreak(1);

        $tableStyle = array(
            'borderColor' => 'D3D3D3',
            'borderSize'=>6,
        );
        $firstTableRow = array(
            'borderColor' => 'D3D3D3',
            'borderSize'=>6,
            'bgColor' => 'E0E8E7'
        );
        $tableTextStyle = array(
            'color'=>'808080',
            'size'=>12
        );
        $tableMain = $section->addTable();
        $tableMain->addRow();
        $tableMain->addCell(1300, $firstTableRow)->addText('Cantidad', $tableTextStyle, [ 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $tableMain->addCell(4800, $firstTableRow)->addText('Articulo', $tableTextStyle, [ 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $tableMain->addCell(1300, $firstTableRow)->addText('Precio', $tableTextStyle, [ 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $tableMain->addCell(1300, $firstTableRow)->addText('% Dto.', $tableTextStyle, [ 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $tableMain->addCell(1300, $firstTableRow)->addText('Importe', $tableTextStyle, [ 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        foreach ($invoice->items as $item)
        {
            $tableMain->addRow();
            $tableMain->addCell(1300, $tableStyle)->addText($item->qty, [], [ 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $tableMain->addCell(4800, $tableStyle)->addText($item->name);
            $tableMain->addCell(1300, $tableStyle)->addText(number_format($item->price, 2), [], [ 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $tableMain->addCell(1300, $tableStyle)->addText(number_format($item->discount_percent, 2), [], [ 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $tableMain->addCell(1300, $tableStyle)->addText(number_format($item->total, 2), [], [ 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        }

        $textPayment = 'NOMBRE: Paulownia Professional; BANCO: Caja Rural; IBAN: ES41 3080 0060 7622 4552 2319;
            <w:br/>BIC: BCOEESMM080; abone el 100% del importe total para reserva del material de cultivo
            <w:br/>indicando numero de factura como referencia del pago.';

        $section->addText($textPayment, array('font'=>'Calibri','size' => 9), array('indentation' => array('left' => 540, 'right' => 520)));

        $childTableStyle = array(
            'borderColor' => '808080',
            'borderSize'=>6,
        );
        $parentTable = $section->addTable(array('borderTopColor'=>'808080', 'borderTopSize'=>6));
        $parentTableRow = $parentTable->addRow();
        $parentTableCell1 = $parentTableRow->addCell(5000);
        $parentTableCell2 = $parentTableRow->addCell();
        $childTable1 = $parentTableCell1->addTable();
        $childTable1->addRow();
        $childTable1->addCell()->addImage('images/stamp.png',  array(
            'width'=>200,
            'height'=>200,
        ));
        $childTable2 = $parentTableCell2->addTable();
        $childTable2->addRow();
        $childTable2->addCell(1600)->addText('Subtotal', array('size' => 14,'color'=> '808080'));
        $childTable2->addCell(3000, $childTableStyle)->addText(number_format($invoice->sub_total, 2), [], [ 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $childTable2->addRow();
        $childTable2->addCell(1600)->addText('I.V.A. 10%', array('size' => 14,'color'=> '808080'));
        $childTable2->addCell(3000, $childTableStyle)->addText(number_format($invoice->tax_amount, 2), [], [ 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $childTable2->addRow();
        $childTable2->addCell(1600)->addText('TOTAL', array('bold'=>true, 'size' => 16,'color'=> '808080'));
        $childTable2->addCell(3000, $childTableStyle)->addText(number_format($invoice->grand_total, 2), [], [ 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);

        $footer = $section->addFooter();
        $textFooter = 'La Empresa Vivero Paulownia Professional S.L. CIF:B44276491 inscrita en el Registro Oficial de Productores, Comerciantes e Importadores de Vegetales de la Comunidad Autónoma de Aragón conel número ES/02/44-0655 con dirección en Camino Estanca S/n apartado de correos 50, Alcañiz 44600, Teruel, España. Número de pasaporte fitosanitario CE: ES/02/44-0655.';
        $footer->addText($textFooter, array('size'=>6));
        $footer->addImage('images/factura_footer.png',
            array(
                'width'=>600,
                'height'=>72,
                'positioning' => \PhpOffice\PhpWord\Style\Image::POSITION_ABSOLUTE,
                'posHorizontal' => \PhpOffice\PhpWord\Style\Image::POSITION_ABSOLUTE,
                'posVertical' => \PhpOffice\PhpWord\Style\Image::POSITION_ABSOLUTE,
                'marginLeft' => -75,
                'marginTop'=>-50,
                'wrappingStyle'=> 'behind'
            ));
        $document = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $document->save(storage_path('factura-' . $invoice->id . '.docx'));

        return response()->download(storage_path('factura-' . $invoice->id . '.docx'))->deleteFileAfterSend(true);

    }

}
