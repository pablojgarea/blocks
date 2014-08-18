$(document).ready(function() {
    jQuery("#radial_container").radmenu({
        listClass: 'list', // the list class to look within for items
        itemClass: 'item', // the items - NOTE: the HTML inside the item is copied into the menu item
        radius: 60 + navItems * 20, // radius in pixels
        animSpeed: 400, // animation speed in millis
        centerX: 30, // the center x axis offset
        centerY: 100, // the center y axis offset
        selectEvent: "click", // the select event (click)
        onSelect: function($selected) { // show what is returned 
            alert("you clicked on .. " + $selected.index());
        },
        angleOffset: 0 // in degrees
    });
    jQuery("#radial_container").radmenu("show");
});