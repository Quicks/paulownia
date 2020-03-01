@push('css')
    <link rel="stylesheet" href="{{ asset('css/main-calculate.css') }}?v12">
    <link rel="stylesheet" href="{{ asset('css/selectric.css') }}?v5">
@endpush

<div class="row mx-auto pt-xl-5 pb-xl-5 calc-width">
    <div class="col-12 mb-5 text-center">
        <p class="calculate-title">Calculate your income</p>
        <hr class="calc-title-line">
    </div>
    <div class="col-xl-3 col-md-4 col-sm-12 padding-425px-calc">
        <select  id="view" name="view">
            <option selected disabled hidden>View of paulowna</option>
            <option value="ZE">Paulownia ZE PRO®</option>
            <option value="TURBO">Paulownia TURBO PRO®</option>
            <option value="ShanTong">Paulownia ShanTong</option>
        </select>
    </div>
    <div class="col-xl-3 col-md-4 col-sm-12 padding-425px-calc">
        <select id="fitForm" name="fitForm">
            <option class="formTitle" id="fitFormSelected" selected disabled hidden>Fit form</option>
            <option class="fitForm form1" id="form1" value="5*4">5x4 m</option>
            <option class="fitForm form2" id="form2" value="5*5">5x5 m</option>
            <option class="fitForm form3" id="form3" value="6*5">6x5 m</option>
            <option class="fitForm form4" id="form4" value="6*6">6x6 m</option>
        </select>
    </div>
    <div class="col-xl-3  col-md-4 col-sm-12 padding-425px-calc">
        <input class="calc-number calc-select" type="text" onkeyup="this.value = this.value.replace (/\D/, '')"
               id="numberTrees" name="numberTrees" placeholder="Number of trees">
    </div>
    <div class="col-xl-3 col-md-12 col-sm-12 margin-425">
        <button class="button-calc" data-toggle="modal"  data-target="#calcAnswer">
            <img class="lazyload w-100" data-src="{{asset('/images/calculate.png')}}">
        </button>
    </div>
</div>
<div class="modal fade" id="calcAnswer" tabindex="-1" role="dialog" aria-labelledby="calcResult" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-calc">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="calcResult"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{asset('js/jquery.selectric.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('select').selectric({
                arrowButtonMarkup: '<i class="button fa fa-angle-down" aria-hidden="true"></i>',
                nativeOnMobile: true,
            });
            let viewTree = $('#view');
            let valueOptionTree;
            let fitForm = $('#fitForm');
            let valueFitForm;
            $('li.form1').addClass('disabled');
            $('li.form2').addClass('disabled');
            $('li.form3').addClass('disabled');
            $('li.form4').addClass('disabled');
            viewTree.on('change', function () {
               valueOptionTree = $(this).val();
                if(valueOptionTree === "ZE" || valueOptionTree === "ShanTong") {
                    $('li.form1').removeClass('disabled');
                    $('li.form2').removeClass('disabled');
                    $('li.form3').addClass('disabled');
                    $('li.form4').addClass('disabled');
                }
                if(valueOptionTree === "TURBO") {
                    $('li.form1').addClass('disabled');
                    $('li.form2').addClass('disabled');
                    $('li.form3').removeClass('disabled');
                    $('li.form4').removeClass('disabled');
                }
                setTimeout(function() {
                    $('.selectric span').html('Fit form');
                    viewTree.selectric('refresh');
                }, 500);
            });
            fitForm.change(function () {
                valueFitForm = $(this).val();
            });
            $('.button-calc').on('click', function () {
                let numberThreeEl = parseInt($('#numberTrees').val());
                let calcResult = $('#calcResult');
                let result;
                console.log(numberThreeEl);
                if(valueOptionTree === "ZE"){
                    if(valueFitForm === "5*4") {
                        result = Math.floor(numberThreeEl * 0.58);
                    }
                    if(valueFitForm === "5*5") {
                        result = Math.floor(numberThreeEl * 0.7);
                    }
                }
                if(valueOptionTree === "ShanTong"){
                    if(valueFitForm === "5*4") {
                        result = Math.floor(numberThreeEl * 0.52);
                    }
                    if(valueFitForm === "5*5") {
                        result = Math.floor(numberThreeEl * 0.65);
                    }
                }
                if(valueOptionTree === "TURBO"){
                    if(valueFitForm === "6*5") {
                        result = Math.floor(numberThreeEl * 0.92);
                    }
                    if(valueFitForm === "6*6") {
                        result = Math.floor(numberThreeEl * 1.12);
                    }
                }
                calcResult.html("Growth: " + result + " m3");
            });
        });
    </script>
@endpush