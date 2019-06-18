@if (\Session::has('type'))
@switch(\Session::get('type'))
@case('success')
<script>
    $(document).ready(function() {
        toastr.success("{{ \Session::get('msg') }}")
    })
</script>
@break
@case('error')
<script>
    $(document).ready(function() {
        toastr.error("{{ \Session::get('msg') }}")
    })
</script>
@break
@default

@endswitch
@endif
