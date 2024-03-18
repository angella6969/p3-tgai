<div class="col-sm-10">
    <label for="{{ $nama }}">{{ $judul }}</label>
    <input type="hidden" name="oldImage" id="oldImage" value="{{ $nilai }}">
    
    @if ($nilai)
        <img src="{{ asset('storage/' . substr($nilai, 7)) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" id="img-preview-{{ $nama }}">
    @else
        <img class="img-preview img-fluid mb-3 col-sm-5" id="img-preview-{{ $nama }}">
    @endif
    
    <input required type="file" class="form-control @error('$nama') is-invalid @enderror" id="{{ $nama }}" onchange="validateImg(this)" name="{{ $nama }}" accept="image/*, image/png, image/gif">
    <h6>Photo Max 1 MB</h6>
</div>

<script>
    function validateImg(input) {
        const file = input.files[0];
        const maxSize = 1024 * 1024; // 1 MB
        
        if (file && file.size > maxSize) {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'File terlalu besar. Maksimum ukuran file adalah 1 MB.'
            });
            input.value = ''; // Hapus nilai input
        } else {
            previewImage(input.id); // Menampilkan pratinjau gambar
        }
    }
    
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
