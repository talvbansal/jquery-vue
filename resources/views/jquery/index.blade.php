<!doctype html>
<html lang="en">
<head>
    <title>jQuery | Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container-fluid">
    <div id="content">
        <div>
            <h1>jQuery example</h1>
            <hr/>
            <button id="fetchQuotes" class="btn btn-primary">Fetch Quotes</button>
        </div>

        <br>

        <table id="tblQuotes" class="table table-hover">
            <caption id="customer_id"></caption>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Insurer</th>
                    <th scope="col">Scheme</th>
                    <th scope="col">Premium</th>
                    <th scope="col">Cover Type</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Select</th>
                </tr>
            </thead>

            <tbody>

            </tbody>
        </table>

    </div>
</div>

<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<script>

    function fetchQuotes() {
        $.ajax({
            url: "/data/quotes",
            type: "GET",
            dataType: "json",
        }).done(function (json) {
          setTimeout(function() {
            var tbody = $('#tblQuotes tbody');
            tbody.empty();

            var items = [];
            $.each(json, function (key, data) {
              var row = "<tr>" +
                "<th scope='row'>" + data.id + "</th>" +
                "<td>" + data.insurer + "</td>" +
                "<td class='text-right'>" + data.scheme_no + "</td>" +
                "<td class='text-right font-weight-bold'>£" + data.premium + "</td>" +
                "<td>" + data.cover_type + "</td>" +
                "<td>" + data.notes + "</td>";

              if (data.valid) {
                row += "<td><button type='button' class='btn btn-primary'><i class='fa fa-check'></i>&nbsp;Select</button></td>"
              } else {
                row += "<td><button type='button' class='btn btn-danger'><i class='fa fa-times'></i>&nbsp;Invalid</button></td>"
              }
              row += "</tr>";

              items.push(row);
            });

            tbody.append(items.join(""));
            $('#customer_id').text('Customer: ' + json[0].customer_id);
          }, 1000);
        });
    }

    $(document).ready(function () {
        $('#fetchQuotes').click(fetchQuotes);
    });

</script>

</body>
</html>