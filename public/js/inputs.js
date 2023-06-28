$(document).ready(function () {
    let counter = 2;
    $("#addRow").click(function () {
        counter++
        let html = `<div id="inputFormRow">
        <div class="input-group mb-3">
        <input type="text" name="answers[][answer]" class="form-control m-input" placeholder="Here enter your answer" autocomplete="off">
        <div class="input-group-append">
        <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
        </div>
        </div>`;
        $("#newRow").append(html);
    });

    // remove row
    $(document).on("click", "#removeRow", function () {
        if(counter==2){
            alert("You need to have at least 2 answers.");
            return false;
        }
        $(this).closest("#inputFormRow").remove();
        counter--
    });
});
