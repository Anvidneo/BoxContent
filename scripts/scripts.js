$(document).ready(function() {
    create_table();
    categories('categories_new');
    categories('categories_edit');
});

function create_table() {
    $.ajax({
        type: 'POST',
        url: 'index.php',
        data: {
            request: 'products',
            id: '',
            id_category: ''
        },
        dataType: 'json',
        success: function(data){
            let table = '';
            data['data'].forEach(element => {
                table = table + `<tr>
                    <td>${element.id}</td>
                    <td>${element.id_category}</td>
                    <td>${element.name}</td>
                    <td>${element.reference}</td>
                    <td>${element.stock}</td>
                    <td>${element.price}</td>
                    <td>${element.weight}</td>
                    <td><a id="btn_edit" value="${element.id}" href='#editProductModal' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='' data-original-title='Edit'></i></a></td>
                    <td><a id="btn_delete" value="${element.id}" href='#deleteProductModal' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='' data-original-title='Delete'></i></a></td>
                </tr>`

                document.getElementById("content_products").innerHTML = table;
                document.getElementById("table_content").style.display = 'block';
            });
        },
        error : function(xhr, status) {
            console.log('Error')
            let msg = "<div class='alert alert-danger' role='alert'>Sorry, not possible charge the products</div>"
            document.getElementById("msg").innerHTML = msg;
            document.getElementById("msg").style.display = 'block';
            document.getElementById("table_content").style.display = 'none';
        },
    });
}

$("#content_products").on("click", "#btn_delete", function() {
    let id = $(this).attr('value');
    $('#id_delete').attr('value', id);
})

$("#id_delete").click(function() {
    let id = $(this).attr('value');
    delete_product(id)
    create_table()
})

function delete_product(id_product) {
    $.ajax({
        type: 'POST',
        url: 'index.php',
        data: {
            request: 'delete_product',
            id: id_product,
        },
        dataType: 'json',
        success: function(data){
            console.log(data)
            if (data.state === 1) {
                console.log('Success')
                let msg = "<div class='alert alert-success' role='alert'>The product delted</div>"
                document.getElementById("msg").innerHTML = msg;
                document.getElementById("msg").style.display = 'block';
            } else {
                console.log('Error')
                let msg = "<div class='alert alert-danger' role='alert'>Sorry, not possible delete the product</div>"
                document.getElementById("msg").innerHTML = msg;
                document.getElementById("msg").style.display = 'block';
            }
        },
        error : function(xhr, status) {
            console.log('Error')
            let msg = "<div class='alert alert-danger' role='alert'>Sorry, not possible delete the product</div>"
            document.getElementById("msg").innerHTML = msg;
            document.getElementById("msg").style.display = 'block';
        },
    });
}

function categories(select) {
    $.ajax({
        type: 'POST',
        url: 'index.php',
        data: {
            request: 'category',
            id: '',
        },
        dataType: 'json',
        success: function(data){
            console.log(data)
            if (data.state === 1) {
                let options = '<option selected>Select category</option>';
                data['data'].forEach(element => {
                    options = options + `<option value="${element.id}">${element.name}</option>`
                    document.getElementById(select).innerHTML = options;
                });
            } else {
                console.log('Error');
            }
        },
        error : function(xhr, status) {
            console.log('Error');
        },
    });
}

$("#new_product").click(function() {
    let data = {
        request: 'new_product',
        id_category: $('#categories_new').val(),
        name: $('#new_name').val(),
        price: $('#new_price').val(),
        weight: $('#new_weight').val(),
        stock: $('#new_stock').val(),
        reference: $('#new_reference').val(),
    }
    new_product(data)
})

function new_product(data) {
    $.ajax({
        type: 'POST',
        url: 'index.php',
        data: data,
        dataType: 'json',
        success: function(data){
            console.log(data)
            if (data.state === 1) {
                create_table()
            } else {
                console.log('Error');
            }
        },
        error : function(xhr, status) {
            console.log('Error');
        },
    });
}

$("#content_products").on("click", "#btn_edit", function() {
    let id = $(this).attr('value');
    $('#edit_product').attr('value', id);
    console.log(id)
})

$("#edit_product").click(function() {
    let data = {
        request: 'update_product',
        name: $('#edit_name').val(),
        price: $('#edit_price').val(),
        weight: $('#edit_weight').val(),
        id_category: $('#categories_edit').val(),
        stock: $('#edit_stock').val(),
        reference: $('#edit_reference').val(),
        id: $(this).attr('value'),
    }
    new_product(data)
})

function edit_product(data) {
    $.ajax({
        type: 'POST',
        url: 'index.php',
        data: data,
        dataType: 'json',
        success: function(data){
            console.log(data)
            if (data.state === 1) {
                create_table()
            } else {
                console.log('Error');
            }
        },
        error : function(xhr, status) {
            console.log('Error');
        },
    });
}
