var cars = 
        [
            ["Regular", "R_A1"],
            ["Regular", "R_A2"],
            ["Premium", "P_B1"],
            ["Premium", "P_B2"],
            ["dedicated_Regular", "DR_A1"],
            ["dedicated_Premium", "DP_B2"]
        ];

function verificationComplete()	
{
    swal("Verification Success!", "You are being Redirected to the Store Page", "success");
}

function getCars() 
{
            var merk = document.getElementById("serverClass").value;
            var mobil = document.getElementById("serverType").value;

            var option = "";
            
            for (let i = 0; i < cars.length; i++) 
            {
                if(cars[i][0] == merk)
                {
                    option += '<option value="'+cars[i][1]+'">'+cars[i][1]+'</option>';
                }
            }

            document.getElementById("serverType").disabled = false;
            document.getElementById('serverType').innerHTML = option;
}		

function FungsiNilai()
{

    var hargavar = document.getElementById("total").innerHTML;
    var rentDuration = document.getElementById("rentDuration");
    var getRentDuration = rentDuration.options[rentDuration.selectedIndex].text;
    var setRentDuration = 0;

    var dpvar = document.getElementById("dp").value;
    var year = 12;
    switch(getAngsuranValue)
    {
        case '1':
            setRentDuration = year * 3;
        break;
        case '3':
            setRentDuration = year * 4;
        break;
        case '6':
            setRentDuration = year * 5;
        break;
        case '12':
            setRentDuration = year * 5;
        break;
    }

        var output = (parseInt(hargavar) - parseInt(dpvar)) / parseInt(setRentingDuration);
    document.getElementById("hasilangsuran").value=output;
}