<form action="{{ route('locale.set', '$lang') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="nav-link" style="background: transparent; border:none; margin-right: 40px; color: black;">
        <span class="flag-icon flag-icon-{{ $country }}"></span>
    </button>
</form>

