$(document).ready(function() {
    $("#subj-1").draggable({
      helper: 'clone',
      cursor: 'move',
      start: function(event, ui) {
        // Set the rowspan to 6 when dragging starts
        $("#subj-1").attr('data-rowspan', '6');
      }
    });

    // Make the table droppable
    $("#scheduleTable td").droppable({
      drop: function(event, ui) {
        // Get the rowspan value and apply it to the dragged div
        var rowspan = $("#subj-1").attr('data-rowspan');
        $(this).attr('rowspan', rowspan);
      }
    });
  });