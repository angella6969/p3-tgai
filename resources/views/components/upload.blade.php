<div class="col-sm-10">
    <label for="{{ $nama }}">{{ $judul }}</label>
    <input type="hidden" name="oldImage" id="oldImage" value="{{ $nilai }}">

    @if ($nilai)
        <img src="{{ asset('storage/' . substr($nilai, 7)) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block"
            id="img-preview-{{ $nama }}">
    @else
        <img class="img-preview img-fluid mb-3 col-sm-5" id="img-preview-{{ $nama }}">
    @endif

    <input type="file" class="form-control @error('$nama') is-invalid @enderror" id="{{ $nama }}"
        onchange="previewImage('{{ $nama }}')" name="{{ $nama }}"
        accept="image/*, image/png, image/gif">
    <h6>{{ $detail }}</h6>
</div>
<script>
    function previewImage(id) {
        const image = document.querySelector(`#${id}`);
        const imgPreview = document.querySelector(`#img-preview-${id}`);

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();

        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
