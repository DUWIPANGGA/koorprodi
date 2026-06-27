@php $rekap = $rekap ?? null; @endphp

<div style="margin-bottom: 20px;">
    <label for="semester" style="display: block; font-weight: bold; margin-bottom: 5px;">Semester:</label>
    <select id="semester" name="semester" required {{ $isEdit ? 'disabled' : 'disabled' }}
        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; background: #f9f9f9;">
        @for ($i = 1; $i <= 8; $i++)
        <option value="{{ $i }}"
            @if(($rekap ? $rekap->semester : old('semester', Auth::user()->semester)) == $i) selected @endif>
            Semester {{ $i }}
        </option>
        @endfor
    </select>
</div>

<div style="margin-bottom: 20px;">
    <label for="IPK" style="display: block; font-weight: bold; margin-bottom: 5px;">IPK:</label>
    <input type="number" id="IPK" name="IPK" value="{{ old('IPK', $rekap->IPK ?? '') }}" step="0.01"
        min="0" max="4" required
        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
</div>

<div style="margin-bottom: 20px;">
    <label for="dokumen" style="display: block; font-weight: bold; margin-bottom: 5px;">KHS (PDF):</label>
    <input type="file" id="dokumen" name="dokumen" accept=".pdf" {{ $isEdit ? '' : 'required' }}
        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
    @if($rekap && $rekap->dokumen)
    <div style="margin-top: 5px; font-size: 12px; color: #666;">
        File saat ini: <a href="{{ asset($rekap->dokumen) }}" target="_blank">Lihat Dokumen</a> (Kosongkan jika tidak ingin mengganti)
    </div>
    @endif
</div>

<div style="margin-bottom: 20px;">
    <label for="kesulitan" style="display: block; font-weight: bold; margin-bottom: 5px;">Kesulitan:</label>
    <textarea id="kesulitan" name="kesulitan" rows="4" required
        style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">{{ old('kesulitan', $rekap->kesulitan ?? '') }}</textarea>
</div>

@if(!$isEdit)
<div style="margin-bottom: 20px; font-size: 12px; color: #666;">* Anda hanya dapat mengisi form ini satu kali.</div>
@endif

<button type="submit"
    style="width: 100%; padding: 10px; background-color: #007bff; color: #fff; font-weight: bold; border: none; border-radius: 5px; cursor: pointer;">
    {{ $isEdit ? 'Update Pelaporan' : 'Simpan Pelaporan' }}
</button>
