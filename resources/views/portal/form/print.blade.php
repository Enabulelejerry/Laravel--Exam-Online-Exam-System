
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>

    <style>
        .print_container{
            width:50%;
            margin:auto;
        }
        .exam_title{
            text-align: center
        }
        .info_block{
            width:50%;
            height:50px;
            line-height: 50px;
            text-align: center;
            margin: auto;
            border: 2px solid black;
            border-radius:15px;
        }

        .user_info_block{  
            margin-top:50px;
        }
    </style>
</head>
<body>

    <div class="print_container">
        <div class="exam_title">
                <h3> Exam Title : {{ $exam_title }}</h3>
                <h3> Exam Date : {{ date('d/ m /Y',strtotime($exam_date))  }}</h3>
        </div>

        <div class="user_info_block">
            <div class="info_block" style="margin-bottom:15px">
                <label> Name:  {{ $std_info->name }}</label>
            </div>

            <div class="info_block" style="margin-bottom:15px">
                <label> Email: {{ $std_info->email }}</label>
            </div>

            <div class="info_block" style="margin-bottom:15px">
                <label> Mobile No: {{ $std_info->mobile_no }}</label>
            </div>

            <div class="info_block" style="margin-bottom:15px">
                <label> DOB: {{ $std_info->dob }}</label>
            </div>
 
        </div>
        <div class="print_btn">
        <button onclick="window.print()">Print</button>
        </div>

    </div>
    
</body>
</html>