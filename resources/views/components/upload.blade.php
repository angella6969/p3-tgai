<div class="col-sm-10">
    <label for="{{ $nama }}">{{ $judul }}</label>
    <input type="hidden" name="oldPdf" id="oldPdf" value="{{ $nilai }}">

    {{-- @empty($nilai)
        <!-- Jika nilai kosong atau null, sembunyikan -->
    @else
        <!-- Jika nilai tidak kosong, tampilkan link ke PDF yang sudah ada -->
        <a href="{{ asset('storage/' . substr($nilai, 6)) }}" target="_blank">View PDF</a>
    @endempty --}}

    <input type="file" class="form-control @error('$nama') is-invalid @enderror" id="{{ $nama }}"
        onchange="validatePdf(this)" name="{{ $nama }}" accept="application/pdf">
    <h6>PDF Max 1 MB</h6>
</div>
{{--  --}}
<script>
    function validatePdf(input) {
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
            previewPdf(input.id); // Jika ukuran berkas valid, lanjutkan dengan menampilkan preview
        }
    }

    function previewPdf(id) {
        const pdfInput = document.querySelector(`#${id}`);
        const oldPdfInput = document.querySelector('#oldPdf');

        // Hapus preview yang lama (jika ada)
        const oldPdfPreview = document.querySelector('#pdf-preview');
        if (oldPdfPreview) {
            oldPdfPreview.remove();
        }

        // Sembunyikan preview gambar (jika ada)
        const imgPreview = document.querySelector(`#img-preview-${id}`);
        if (imgPreview) {
            imgPreview.style.display = 'none';
        }

        // Sisipkan preview baru
        const pdfPreview = document.createElement('object');
        pdfPreview.data = URL.createObjectURL(pdfInput.files[0]);
        pdfPreview.width = '100%';
        pdfPreview.height = '500px';
        pdfPreview.id = 'pdf-preview'; // Pastikan ID preview baru unik

        // Masukkan preview baru setelah input file
        pdfInput.parentNode.insertBefore(pdfPreview, pdfInput.nextSibling);

        // Perbarui nilai input hidden dengan nilai terbaru
        oldPdfInput.value = '';
        oldPdfInput.value = pdfInput.value;
    }
</script>
