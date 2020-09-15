<button data-action="show" data-href="{{ route('~package.~resource.show', $~resource) }}" class="btn btn-sm btn-default">
    <span class="fa fa-eye"></span>
</button>
<a href="{{ route('~package.~resource.edit', $~resource) }}" class="btn btn-sm btn-primary">
    <span class="fa fa-pencil-alt"></span>
</a>
<button data-action="delete" data-href="{{ route('~package.~resource.destroy', $~resource) }}" class="btn btn-sm btn-danger">
    <span class="fa fa-trash"></span>
</button>
