
@if(session('success'))
<script>
  message('{{ session("success") }}', 'success');  
</script>
@endif

@if(session('warning'))
<script>
  message('{{ session("warning") }}', 'warning');  
</script>
@endif

@if(session('error'))
<script>
  message('{{ session("error") }}', 'error');  
</script>
@endif

