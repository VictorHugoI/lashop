$(".alert").fadeTo(2000, 1000).slideUp(1000, function() {
    $(".alert").slideUp(1000);
});

function getData(callback, errorCB) {
    var metaUrl = document.getElementsByName('base-url')[0].getAttribute('content');
    $.get(metaUrl + "/admin/categories", function(data, status) {
            // alert("Data: " + data + "\nStatus: " + status);
        }).done(function(data) {
            var categories = $.map(data.categories, function(value, index) {
                return [value];
            });
            // console.log(nodes);
            // console.log(nodes.length);
            // console.log(treeify(nodes));

            console.log(treeify(categories));

            $('#base-list').html(buildDom(treeify(categories)));

            callback();
        })
        .fail(function(request, status, error) {
            console.log(status);
            errorCB(error);
        });
}

function treeify(list, idAttr, parentAttr, childrenAttr) {
    if (!idAttr) idAttr = 'id';
    if (!parentAttr) parentAttr = 'parent_id';
    if (!childrenAttr) childrenAttr = 'children';

    var treeList = [];
    var lookup = {};
    list.forEach(function(obj) {
        lookup[obj[idAttr]] = obj;
        obj[childrenAttr] = [];
    });
    list.forEach(function(obj) {
        if (obj[parentAttr] != 0) {
            lookup[obj[parentAttr]][childrenAttr].push(obj);
        } else {
            treeList.push(obj);
        }
    });
    return treeList;
}

function saveJSON(data, errorCB) {
    var metaUrl = document.getElementsByName('base-url')[0].getAttribute('content');
    $.ajax({
        method: "POST",
        url: metaUrl + "/admin/categories",
        data: {
            'data': data
        },
        error: function(request, status, error) {
            errorCB(error);
        }
    }).done(function(result) {
        console.log(data);
        console.log(result.success);
        saveState.listsChanged = false;

        if(!saveState.listsChanged) {
            window.location.reload();
        }
    }).fail(function() {
        $("#flash-messaging").show().html("Save error.").addClass('negative');
        setTimeout(function() {
            $("#flash-messaging").fadeOut(1000);
        }, 1000);
    });
}
