<table class="table table-striped table-bordered table-hover dataTables-example" >
    <thead>
    <tr>
        <th>Property name</th>
        <th>Label for property</th>
        <th>Action</th>
        <th>Chosen</th>
    </tr>
    </thead>
    <tbody class="tableContent">
        @each('admin.properties.component.row_table_property', $properties, 'property')
    </tbody>
</table>
