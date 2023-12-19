 // Dynamically populate Room Number options based on the selected building
 $("#buildingName").change(function () {
    var buildingName = $(this).val();
    var roomNumberOptions = "";

    switch (buildingName) {
      case "J":
        for(let i=201; i<=216; i++){
            roomNumberOptions += `<option value="${buildingName + i}">${buildingName + i}</option>`;
        }
        for(let i=301; i<=316; i++){
            roomNumberOptions += `<option value="${buildingName + i}">${buildingName + i}</option>`;
        }
        for(let i=401; i<=416; i++){
            roomNumberOptions += `<option value="${buildingName + i}">${buildingName + i}</option>`;
        }
        break;
      case "S":
        for(let i=201; i<=216; i++){
            roomNumberOptions += `<option value="${buildingName + i}">${buildingName + i}</option>`;
        }
        for(let i=301; i<=316; i++){
            roomNumberOptions += `<option value="${buildingName + i}">${buildingName + i}</option>`;
        }
        break;
      case "L":
        for(let i=205; i<=208; i++){
            roomNumberOptions += `<option value="${buildingName + i}">${buildingName + i}</option>`;
        }
        for(let i=301; i<=304; i++){
            roomNumberOptions += `<option value="${buildingName + i}">${buildingName + i}</option>`;
        }
        break;
      case "C":
        for(let i=601; i<=616; i++){
            roomNumberOptions += `<option value="${buildingName + i}">${buildingName + i}</option>`;
        }
        for(let i=701; i<=716; i++){
            roomNumberOptions += `<option value="${buildingName + i}">${buildingName + i}</option>`;
        }
        break;
    }

    $("#roomNumber").html(roomNumberOptions);
  });

  // Toggle visibility of optional fields for Lec + Lab based on the selected subject type
  $("#subjectType").change(function () {
    var subjectType = $(this).val();
    if (subjectType === "lecLab") {
      $("#lecLabFields").show();
    } else {
      $("#lecLabFields").hide();
    }
  });

  // Dynamically populate additional Room Number options for Lec + Lab based on the selected additional building
  $("#additionalBuildingName").change(function () {
    var additionalBuildingName = $(this).val();
    var additionalRoomNumberOptions = "";

    switch (additionalBuildingName) {
      case "S":
        additionalRoomNumberOptions += "<option value='S201'>S201 to S208</option>";
        break;
      case "L":
        additionalRoomNumberOptions += "<option value='L201'>L201 to L204</option>";
        additionalRoomNumberOptions += "<option value='L305'>L305 to L308</option>";
        break;
      case "C":
        additionalRoomNumberOptions += "<option value='C201'>C201 to C208</option>";
        additionalRoomNumberOptions += "<option value='C301'>C301 to C308</option>";
        additionalRoomNumberOptions += "<option value='C501'>C501 to C508</option>";
        break;
    }

    $("#additionalRoomNumber").html(additionalRoomNumberOptions);
  });

  // Dynamically populate Days of the Week options based on the selected subject type
  $("#subjectType, #daysOfWeek").change(function () {
    var subjectType = $("#subjectType").val();
    var daysOfWeekOptions = "";

    if (subjectType === "lecture") {
      daysOfWeekOptions += "<option value='M/W'>M/W</option>";
      daysOfWeekOptions += "<option value='T/TH'>T/TH</option>";
      daysOfWeekOptions += "<option value='F/S'>F/S</option>";
    } else if (subjectType === "lecLab") {
      daysOfWeekOptions += "<option value='M'>M</option>";
      daysOfWeekOptions += "<option value='T'>T</option>";
      daysOfWeekOptions += "<option value='W'>W</option>";
      daysOfWeekOptions += "<option value='TH'>TH</option>";
      daysOfWeekOptions += "<option value='F'>F</option>";
      daysOfWeekOptions += "<option value='S'>S</option>";
    }

    $("#daysOfWeek").html(daysOfWeekOptions);
  });

  // Dynamically populate End Time options based on the selected subject type and start time
  $("#subjectType, #startTime").change(function () {
    var subjectType = $("#subjectType").val();
    var startTime = $("#startTime").val();
    var endTimeOptions = "";

    if (subjectType === "lecture") {
      if (startTime === "7:00" || startTime === "8:30") {
        endTimeOptions += "<option value='8:30'>8:30 AM</option>";
        endTimeOptions += "<option value='10:00'>10:00 AM</option>";
      } else if (startTime === "10:00" || startTime === "11:30") {
        endTimeOptions += "<option value='11:30'>11:30 AM</option>";
        endTimeOptions += "<option value='13:00'>1:00 PM</option>";
      } else if (startTime === "13:00" || startTime === "14:30") {
        endTimeOptions += "<option value='14:30'>2:30 PM</option>";
        endTimeOptions += "<option value='16:00'>4:00 PM</option>";
        endTimeOptions += "<option value='17:30'>5:30 PM</option>";
      }
    } else if (subjectType === "lecLab") {
      if (startTime === "7:00" || startTime === "8:30" || startTime === "10:00") {
        endTimeOptions += "<option value='8:30'>8:30 AM</option>";
        endTimeOptions += "<option value='11:30'>11:30 AM</option>";
        endTimeOptions += "<option value='14:30'>2:30 PM</option>";
      } else if (startTime === "11:30" || startTime === "13:00" || startTime === "14:30") {
        endTimeOptions += "<option value='13:00'>1:00 PM</option>";
        endTimeOptions += "<option value='16:00'>4:00 PM</option>";
        endTimeOptions += "<option value='17:30'>5:30 PM</option>";
      }
    }

    $("#endTime").html(endTimeOptions);
  });

  function buildingName(buildingLetter){

  }