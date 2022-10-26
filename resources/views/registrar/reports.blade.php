<x-registrar.layout header="Generate Reports">
    @livewire('registrar.generate-reports')
</x-registrar.layout>

<script>
    function printOut(data) {
        var mywindow = window.open('', 'Report On Guest', 'height=1000,width=1000');
        mywindow.document.write('<html><head>');
        mywindow.document.write('<title>Report On Guest</title>');
        mywindow.document.write(`<link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}" />`);
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close();
        mywindow.focus();
        setTimeout(() => {
            mywindow.print();
            return true;
        }, 1000);
    }
</script>
