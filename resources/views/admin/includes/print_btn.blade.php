
<style>
    
    .print-btn {
        background-color: #28a745;
        color: #fff;
        padding: 6px 16px;
        border-radius: 4px;
        font-size: 14px;
    }
</style>

<div class="printbtn text-center mb-3">
<button class="print-btn">Print</button>
</div>
<script>
    let printbtn = document.getElementsByClassName('printbtn')[0];
    printbtn.onclick = function() {
        printbtn.style.display = 'none';
        window.print();
    };
</script>