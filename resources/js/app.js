import './jquery-3.6.0.js';
import './jquery-ui.js';
$( function() {
  $( "#sortable" ).sortable({
    update: function (e, ui) {
      let index = ui.item.index();
    }
  });
} );