<!doctype html>
<html lang="en">
<head>
    <title>Vue | Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

@verbatim
<div class="container-fluid">
    <div id="app">
        <div>
            <h1>Vue example</h1>
            <hr/>
            <button id="fetchQuotes" class="btn btn-primary">Fetch Quotes</button>
        </div>

        <br>

        <table id="tblQuotes" class="table table-hover">
            <caption id="customer_id"></caption>
            <thead>
            <tr>
                <th style="width: 5%;" scope="col">ID</th>
                <th style="width: 15%;" scope="col">Insurer</th>
                <th style="width: 5%;" scope="col">Scheme</th>
                <th style="width: 10%;" scope="col">Premium</th>
                <th style="width: 20%;" scope="col">Cover Type</th>
                <th style="width: 30%;" scope="col">Notes</th>
                <th style="width: 15%;" scope="col">Select</th>
            </tr>
            </thead>

            <tbody>

            </tbody>
        </table>

    </div>
</div>
@endverbatim

<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/vue.js"></script>

<script>
  // # todo
  // [x] add vue library to page
  // [x] create a vue instance
  // [ ] identify items of interest
  // [ ] move presentation markup to the actual markup
  // [ ] filter quote items to only show valid quotes
  // [ ] order quotes to show cheapest at the top
  // [ ] add a toggle to show all or filtered quotes
  // [ ] add a loader

  // # take aways
  // [ ] hand over DOM manipulation to Vue framework
  // [ ] use v-for v-if v-else directives

  const app = new Vue({
    el: '#app',
    computed:{

    },
    data:{

    },
    methods:{

    }
  });


  function fetchQuotes() {
    setTimeout(function () {
      $.ajax({
        url: "/data/quotes",
        type: "GET",
        dataType: "json",
      }).done(function (json) {

        var tbody = $('#tblQuotes tbody');
        tbody.empty();

        var items = [];
        $.each(json, function (key, data) {
          var row = "<tr>" +
            "<th scope='row'>" + data.id + "</th>" +
            "<td>" + data.insurer + "</td>" +
            "<td class='text-right'>" + data.scheme_no + "</td>" +
            "<td class='text-right font-weight-bold'>£" + data.premium.toFixed(2) + "</td>" +
            "<td>" + data.cover_type + "</td>" +
            "<td>" + data.notes + "</td>";

          if (data.valid) {
            row += "<td><button type='button' class='btn btn-primary'><i class='fa fa-check'></i>&nbsp;Select</button></td>"
          } else {
            row += "<td><button type='butto n' class='btn btn-danger'><i class='fa fa-times'></i>&nbsp;Invalid</button></td>"
          }
          row += "</tr>";

          items.push(row);
        });

        tbody.append(items.join(""));
        $('#customer_id').text('Customer: ' + json[0].customer_id);
      });
    }, 1000);
  }

  $(document).ready(function () {
    $('#fetchQuotes').click(fetchQuotes);
  });

</script>

</body>
</html>