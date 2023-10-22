import './jquery-3.6.0.js';
import './jquery-ui.js';
import './flatpickr.js';

$( function() {
  var sortMovement = "";

  $( '#sortable' ).sortable({
    stop: function (e, ui) {
      var replacedTask;
      if( sortMovement === "down" ){
        replacedTask = ui.item.prev();
        if (replacedTask.length === 0) {
          replacedTask = ui.item.next();
        }
      }

      if( sortMovement === "up" ){
        replacedTask = ui.item.next();
        if (replacedTask.length === 0) {
          replacedTask = ui.item.prev();
        }
      }

      updateTaskPriority( ui.item[0].dataset.id, replacedTask[0].dataset.priority);
    },
    change: function(event, ui) {
      sortMovement = ui.position.top - ui.originalPosition.top > 0 ? "down" : "up";
    }
  });

  $('#datetime-picker').flatpickr({
    enableTime: true,
    enableSeconds:true,
    dateFormat: "Y-m-d H:i:s",
    hourIncrement: 1,
    minuteIncrement: 1,
    time_24hr: true,
  });
  
  $('#project-filter').change(function (){
    window.location.href = '?project='+$(this).val();
  });

});

