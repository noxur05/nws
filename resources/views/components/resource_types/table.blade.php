<div class=" mt-5" style="width: 250px">
    <table class="table table-striped rounded-3 text-center" style="border: 1px solid #dee2e6; overflow: hidden;">
      <thead class="">
        <tr>
          <th scope="col">
            <div class="btn">
              <b class="h4">Services</b>
            </div>
          </th>
        </tr>
      </thead>
      <tbody>
        @forelse ($resource_types as $resource_type)
          <tr>
            <td>
              <a class="link-primary text-decoration-none" href="{{route('resource_type.show', ['id' => $resource_type['id']])}}">{{ $resource_type->name }}</a>
            </td>
          </tr>
        @empty
          <tr>
            <td>No Services Found</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  