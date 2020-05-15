$(document).ready(function(){
    $.ajax({
        url:"http://localhost/EPA%20V1/piedata.php",
        method:"GET",
        success:function(data){
            console.log(data);
            var taskvalue=[];
            var taskpercs=[];

            for(var i in data){
                taskvalue.push("Task:" +data[i].Taskname);  //php column name
                taskpercs.push(data[i].Taskperc);
            }

            var chardata = {
                labels:taskvalue,
                datasets :[
                    {
                        label: 'Task id',
                        backgroundColor: 'rgba(200,200,200,0.75)',
                        borderColor:'rgba(200,200,200,0.75)',
                        hoverBackgroundColor:'rgba(200,200,200,1)',
                        hoverBorderColor:'rgba(200,200,200,1)',
                        data:taskpercs
                    }
                ]
            };


            var ctx=$("#mycanvas");
            var barGraph= new Chart(ctx,{
                type:'bar',
                data:chardata
            });
        },
        error: function(data){
            console.log(data);
        }
        
    })
});