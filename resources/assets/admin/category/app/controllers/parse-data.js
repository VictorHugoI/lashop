function buildDom(jsonData) {
    var domList ="";
    // Go through each object (main list card).
    for (var i = 0; i < jsonData.length; i++) {
        domList += buildTitleCard(jsonData[i], i);
        domList += buildCards(jsonData[i]);
        domList += closeList();
    }
    return domList;
}

function buildTitleCard(data, listNumber) {
    var rowNum = listNumber + 1;
    console.log(data.children.length);
    return '<li class="brick large rfl-list-title  rfl-trigger-item" data-row="' + rowNum + '" data-col="1" data-sizex="1" data-sizey="1" data-list-number="' + listNumber + '" > ' +
                '<div class="rfl-title-card">' +
                    '<div class="buttons-title"><span class="fa fa-times rfl-delete"></span><span class="fa fa-plus-circle rfl-add-title "></span><span class="dd-handle fa icon-handle"></span>' +
                    '</div>'+
                    '<span class="fa fa-chevron-right rfl-trigger rfl-trigger-main"></span>' +
                    '<h2 data-id="'+data.id+'" class="rfl-id-content rfl-title-content">' + data.name + '</h2>' +
                '</div>' +
                '<ul class="rfl-subAccordion rfl-list rfl-mainAccordion rfl-trigger-item">';
}

function buildCards(data) {
    var cardList = '';
    if(typeof(data.children) != "undefined") {
    for (var i = 0; i < data.children.length; i++) {
        if (typeof data.children[i] === 'object' && data.children[i].children.length != 0) {
            cardList += buildSublist(data.children[i]);
            // console.log(data.children[i].children.length);
        } else {
            cardList += '<li class="rfl-item">' +
                '<div class="arrow-background"></div>' +
                '<div data-id="'+data.children[i].id+'" class="rfl-sub-id-content rfl-sub-title-content rfl-list-content">' + data.children[i].name + '</div>' +
                '<div class="buttons"><span class="fa fa-times rfl-delete"></span><span class="fa fa-plus-circle rfl-add"></span>' +
                    '<div class="rfl-handle fa icon-handle "></div>' +
                '</div>' +
            '</li>';
        }
    }
    return cardList;
    }
}

function buildSublist(data) {
    // console.log(data);
    var sublist = '<li data-id="'+data.id+'" class="rfl-list-title rfl-item">' +
                    '<div class="arrow-background"></div>' +
                    '<div data-id="'+data.id+'" class="rfl-sub-id-content rfl-sub-title-content rfl-list-content">' + data.name + '</div>' +
                    '<span class="fa fa-chevron-right rfl-trigger "></span>' +
                    '<div class="buttons"><span class="fa fa-times rfl-delete"></span><span class="fa fa-plus-circle rfl-add"></span>' +
                        '<div class="rfl-handle fa icon-handle "></div>' +
                    '</div>' +
                 '</li>' +
                 '<li class="rfl-subaccordion-item">' +
                    '<ul class="rfl-subAccordion rfl-list rfl-trigger-item">';
    sublist += buildCards(data) + '</li></ul>';
    return sublist;
}

function closeList() {
    return '</ul></li>';
}
