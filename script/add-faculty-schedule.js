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
  // $("#subjectType, #daysOfWeek").change(function () {
  //   var subjectType = $("#subjectType").val();
  //   var daysOfWeekOptions = "";

  

   
  //     // daysOfWeekOptions += "<option value='M'>M</option>";
  //     // daysOfWeekOptions += "<option value='T'>T</option>";
  //     // daysOfWeekOptions += "<option value='W'>W</option>";
  //     // daysOfWeekOptions += "<option value='TH'>TH</option>";
  //     // daysOfWeekOptions += "<option value='F'>F</option>";
  //     // daysOfWeekOptions += "<option value='S'>S</option>";

  //   $("#daysOfWeek").html(daysOfWeekOptions);
  // });

  // Dynamically populate End Time options based on the selected subject type and start time
  $("#subjectType, #startTime").change(function () {
    var subjectType = $("#subjectType").val();
    var startTime = $("#startTime").val();
    var endTimeOptions = "";

  
      function addTimeHourHalf(){
        var timeArray = startTime.split(":");
        var hours = parseInt(timeArray[0]);
        var minutes = parseInt(timeArray[1]);
        // Add 1.5 hours to the time
        var newHours = hours + 1; // Add 1 hour
        var newMinutes = minutes + 30; // Add 30 minutes
        
        // Check if adding 30 minutes results in an hour overflow
        if (newMinutes >= 60) {
          newHours++;         // Increment the hour
          newMinutes -= 60;   // Subtract 60 minutes
        }
        
        // Format the result to ensure leading zeros
        var formattedHours = String(newHours);
        var formattedMinutes = String(newMinutes).padStart(2, "0");
        
        // Combine hours and minutes back into HH:mm format
        var resultTime = formattedHours + ":" + formattedMinutes;
        return resultTime;
      }

      function convertToTwelveHr(){
        var timeArray = addTimeHourHalf().split(":");
        var hours = parseInt(timeArray[0]);
        var minutes = parseInt(timeArray[1]);
        var AMPM = "";

        if(hours-12 <0){
          AMPM = "AM";
        }else{
          AMPM = "PM";
          hours -= 12;
        }

        var formattedHours = String(hours);
        var formattedMinutes = String(minutes).padStart(2, "0")

        var combinedTime = formattedHours + ":"+ formattedMinutes + " " +AMPM;
        return combinedTime;
      }

      console.log();

      endTimeOptions += `<option value='${addTimeHourHalf()}'>${convertToTwelveHr()}</option>`;
    
  

    $("#endTime").html(endTimeOptions);
  });

  function buildingName(buildingLetter){

  }