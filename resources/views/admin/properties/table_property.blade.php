<table class="table table-striped table-bordered table-hover dataTables-example" >
    <thead>
    <tr>
        <th>Property name</th>
        <th>Label for property</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody class="tableContent">
        @each('admin.layout.items.row_table_property', $properties, 'property')
    </tbody>
</table>
