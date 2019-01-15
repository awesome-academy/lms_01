@if(Session::has('success'))
        <script> alert('{{ Session::get('success')}}')</script>
@endif

@if(Session::has('fail'))
    <script> alert('{{ Session::get('fail')}}')</script>
@endif
