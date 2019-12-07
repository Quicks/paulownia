@push('css')
    <link rel="stylesheet" href="{{ asset('css/main-calculate.css') }}?v2">
@endpush

<div class="row mx-auto pt-xl-5 pb-xl-5" style="max-width:1200px;">
    <div class="col-12 mb-5 text-center">
        <p class="calculate-title">Calculate your income</p>
        <hr class="calc-title-line">
    </div>
    <div class="col-xl-3">
        <select class="calc-select" id="view" name="view" onchange="getValueView()">
            <option selected disabled hidden>View of paulowna</option>
            <option value="ZE">Paulownia ZE PRO®</option>
            <option value="TURBO">Paulownia TURBO PRO®</option>
            <option value="ShanTong">Paulownia ShanTong</option>
        </select>
        <hr class="calculate-line mt-n2">
    </div>
    <div class="col-xl-3">
        <select class="calc-select" id="fitForm" name="fitForm">
            <option id="fitFormSelected" selected disabled hidden>Fit form</option>
            <option id="form5*4" style="display: none" value="5*4">5x4 m</option>
            <option id="form5*5" style="display: none" value="5*5">5x5 m</option>
            <option id="form6*5" style="display: none" value="6*5">6x5 m</option>
            <option id="form6*6" style="display: none" value="6*6">6x6 m</option>
        </select>
        <hr class="calculate-line mt-n2">
    </div>
    <div class="col-xl-3">
        <input class="calc-number calc-select" type="text" onkeyup="this.value = this.value.replace (/\D/, '')" id="numberTrees" name="numberTrees" placeholder="Number of trees">
        <hr class="calculate-line mt-n2">
    </div>
    <div class="col-xl-3">
        <button class="button-calc" onclick="calculateGrowth()" data-toggle="modal"  data-target="#calcAnswer">
            <img class="lazyload" data-src="{{asset('/images/calculate.png')}}">
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
    <script>
        let viewTree = document.getElementById('view');
        let fitForm = document.getElementById('fitForm');
        let formOption1 = document.getElementById("form5*4");
        let formOption2 = document.getElementById("form5*5");
        let formOption3 = document.getElementById("form6*5");
        let formOption4 = document.getElementById("form6*6");
        function getValueView() {
            let valueOptionTree = viewTree.value;
            if(valueOptionTree === "ZE" || valueOptionTree === "ShanTong") {
                formOption1.style.display = "block";
                formOption2.style.display = "block";
                formOption3.style.display = "none";
                formOption4.style.display = "none";
            }
            if(valueOptionTree === "TURBO") {
                formOption1.style.display = "none";
                formOption2.style.display = "none";
                formOption3.style.display = "block";
                formOption4.style.display = "block";
            }
        }
        viewTree.addEventListener('click', function () {
            let fitFormSelected = document.getElementById('fitFormSelected');
            fitFormSelected.selected = true;
        });
        function calculateGrowth() {
            let calcResult = document.getElementById('calcResult');
            let result;
            let valueOptionTree = viewTree.value;
            let valueFitForm = fitForm.value;
            let numberThreeEl = parseInt(document.getElementById('numberTrees').value);
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
            calcResult.innerHTML = "Growth: " + result + " m3";
        }
    </script>
@endpush