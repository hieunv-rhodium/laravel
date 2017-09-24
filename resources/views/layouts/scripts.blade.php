<script src="{{ mix('js/app.js') }}"></script>
<script src="/js/sweetalert.js"></script>

<script>
    window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
    ]) !!};
</script>