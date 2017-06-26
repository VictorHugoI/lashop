function mapData($baseList) {
    var domList = [];
    $baseList.children().each(function(i) {
        domList.push({});
        domList[i].name = mapTitle($(this));
        domList[i].id = mapId($(this));
        domList[i].children = mapTitleCards($(this));
    });
    return domList;
}

function mapTitle($list) {
    return $list.find('.rfl-title-content').html();
}

function mapSubTitle($list) {
    return $list.find('.rfl-list-content').html();
}

function mapSubId($list) {
    if(typeof($list.find('.rfl-list-content').attr('data-id')) != "undefined") {
        return $list.find('.rfl-list-content').attr('data-id');
    }
    return "0";
}

function mapId($list) {
    if(typeof($list.find('.rfl-id-content').attr('data-id')) != "undefined") {
        return $list.find('.rfl-id-content').attr('data-id');
    }
    return "0";
}

function mapTitleCards($list) {
    var children = [],
        i = 0;
    $list.children('.rfl-list').children().each(function(){
        if ($(this).hasClass('rfl-list-title')) {
            children.push({});
            children[i].name = mapSubTitle($(this));
            children[i].id = mapSubId($(this));
            children[i].children = mapSubCards($(this));
            i++;
        } else if ($(this).hasClass('rfl-item')) {
            // children.push($(this).children('.rfl-list-content').html());
            children.push({});
            children[i].name = mapSubTitle($(this));
            children[i].id = mapSubId($(this));
            i++;
        }
    });
    return children;
}

function mapSubCards($list) {
    var children = [],
        i = 0;
    $list.next('.rfl-subaccordion-item').children('.rfl-list').children().each(function(){
        if ($(this).hasClass('rfl-list-title')) {
            children.push({});
            children[i].name = mapSubTitle($(this));
            children[i].id = mapSubId($(this));
            children[i].children = mapSubCards($(this));
            i++;
        } else if ($(this).hasClass('rfl-item')) {
            // children.push($(this).children('.rfl-list-content').html());
            children.push({});
            children[i].name = mapSubTitle($(this));
            children[i].id = mapSubId($(this));
            i++;
        }
    });
    return children;
}
