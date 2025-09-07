@if (session('swal'))
@php $s = session('swal'); @endphp
<script>
	document.addEventListener('DOMContentLoaded', () => {
		Swal.fire({
			icon: @json($s['icon'] ?? 'info'),
			title: @json($s['title'] ?? 'Aviso'),
			text: @json($s['text'] ?? ''),
			html: @json($s['html'] ?? null),
			timer: @json($s['timer'] ?? null),
			showConfirmButton: @json($s['showConfirmButton'] ?? true),
			confirmButtonText: @json($s['confirmText'] ?? 'OK'),
			cancelButtonText: @json($s['cancelText'] ?? 'Cancelar'),
			showCancelButton: @json($s['showCancelButton'] ?? false),
			allowOutsideClick: @json($s['allowOutsideClick'] ?? true),
		});
	});
</script>
@endif

@if (session('success'))
<script>
	document.addEventListener('DOMContentLoaded', () => {
		Swal.fire({
			icon: 'success',
			title: 'Hecho',
			text: @json(session('success')),
			timer: 2200,
			showConfirmButton: false
		});
	});
</script>
@endif

@if (session('error'))
<script>
	document.addEventListener('DOMContentLoaded', () => {
		Swal.fire({
			icon: 'error',
			title: 'Error',
			text: @json(session('error'))
		});
	});
</script>
@endif

@if ($errors->any())
<script>
	document.addEventListener('DOMContentLoaded', () => {
		const items = `{!! '<ul style="text-align:left;margin:0;">'.collect($errors->all())->map(fn($e)=>"<li>{$e}</li>")->implode('').'</ul>' !!}`;
		Swal.fire({
			icon: 'error',
			title: 'Revisa los campos',
			html: items
		});
	});
</script>
@endif