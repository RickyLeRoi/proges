function associativeModal(arr) {
    for (var id in arr) {

        if (arr[id] === null) {
            arr[id] = "N/D";
        }

        $(id).html(arr[id]);

    }
    $('#clientModal').modal('toggle')
}
