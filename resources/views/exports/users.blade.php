    <table>
        <thead>
        <tr>
            <th style="font-size:14px; text-align: center; position: fixed ;">ชื่อ - นามสกุล (Thai)</th>
            <th style="font-size:14px; text-align: center; position: fixed;">ชื่อ - นามสกุล (Eng)</th>
            <th style="font-size:14px; text-align: center; position: fixed;">เบอร์โทรศัพท์</th>
            <th style="font-size:14px; text-align: center; position: fixed;">อีเมล</th>
            <th style="font-size:14px; text-align: center; position: fixed;">สังกัดหน่วยงาน</th>
            <th style="font-size:14px; text-align: center; position: fixed;">ตำแหน่ง</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td  style="font-size:12px; text-align: left;">{{ $user->nameTH }}</td>
                <td  style="font-size:12px; text-align: left;">{{ $user->nameEN }}</td>
                <td  style="font-size:12px; text-align: left;">{{ $user->phone }}</td>
                <td  style="font-size:12px; text-align: left;">{{ $user->email }}</td>
                @php
                    // $departments = Department::whereIn('id',$user->department ?? [])->pluck('name_th')->implode(', ');
                    $userdepart = explode(',',$user->department);
                   $departments =  App\Models\department::whereIn('id', $userdepart)->pluck('departTH')->implode(', ');
                  
                @endphp
                <td  style="font-size:12px; text-align: left;">{{$departments}}</td>
                @php
                     $userposi = explode(',',$user->position);
                    $positions =  App\Models\position::whereIn('id',$userposi)->pluck('posTH')->implode(', ');
                @endphp
                <td  style="font-size:12px; text-align: left;">{{$positions}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


