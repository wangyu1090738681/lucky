<body>
<form action="http://demo.com/home/test/test7" method="post">
    <input type="text" name="text"/>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <input type="submit"/>
</form>
</body>
