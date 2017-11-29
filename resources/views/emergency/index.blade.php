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
    <div id="content">
        <div>
            <h1>Vue example</h1>
            <hr/>
            <button class="btn btn-primary" v-on:click="fetchQuotes">Fetch Quotes</button>
        </div>

        <br>

        <div v-if="loading" class="text-center">
            <img src="/img/rs-t.gif" alt="Thinking about it..."/>
        </div>
        <div v-else>
            <table class="table table-hover">
                <caption v-if="customer_id">
                    Customer ID: {{ customer_id }} | {{ validQuotes.length }} of {{ quotes.length }} quote | <label><input type="checkbox" v-model="show_all"/>Show All</label>
                </caption>
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
                    <tr v-for="quote in validQuotes">
                        <th>{{ quote.id }}</th>
                        <td>{{ quote.insurer }}</td>
                        <td class='text-right'>{{ quote.scheme_no }}</td>
                        <td class='text-right fold-weight-bold'>£{{ quote.premium.toFixed(2) }}</td>
                        <td>{{ quote.cover_type }}</td>
                        <td>{{ quote.note }}</td>
                        <td class="text-center">
                            <button v-if="quote.valid" class="btn btn-primary"><i class='fa fa-check'></i>&nbsp;Select</button>
                            <button v-else class="btn btn-danger"><i class='fa fa-times'></i>&nbsp;Invalid</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
@endverbatim
<script src="/js/vue.js"></script>
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<script>
    const app = new Vue({
        el: '#content',

        data:{
            customer_id: null,
            loading: false,
            quotes : [],
            show_all: false
        },

        computed:{
          validQuotes()
          {
              return this.quotes.filter((quote) => {
                  return this.show_all || quote.valid;
              }).sort((quoteA, quoteB) => {
                  // put quotes with 0 values at the end of the list...
                  if(quoteA.premium === 0){
                    return 1;
                  }else if(quoteB.premium === 0) {
                    return -1;
                  }

                  return quoteA.premium > quoteB.premium;
              });
          }
        },

        methods:{
            fetchQuotes (){
                this.loading = true;
                $.ajax({
                    url: "/data/quotes",
                    type: "GET",
                    dataType: "json",
                }).done((json) => {
                    setTimeout(()=> {
                        this.quotes = json;
                        this.customer_id = json[0].customer_id;
                        this.loading = false;
                    }, 3500);
                });
            }
        }
    })

</script>

</body>
</html>