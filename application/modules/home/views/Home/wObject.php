<a href="#" id="oahObject" name="oahObject"> a href Object [ oah ]</a>
</br>
<div id="odvObject"> div Object [ odv ]</div>
</br>
<span id="ospObject" name="ospObject"> span Object [ osp ]</span>
</br>
<textarea id="otaObject" name="otaObject"> textarea Object [ ota ]</textarea>
</br>
iframe Object [ oif ]
<iframe id="oifObject" name="oifObject" src="https://www.ada-soft.com/th/home/" title="Adasoft"></iframe>
</br>
<div class="form-group">
    <input type="checkbox" name="ocbObject1" id="ocbObject1" value="Bike">
    <label for="olaObjectocb1">checkbox Object [ ocb 1 ]</label><br>
    <input type="checkbox" name="ocbObject2" id="ocbObject2" value="Car">
    <label for="olaObjectocb2">checkbox Object [ ocb 2 ]</label><br>
    <input type="checkbox" name="ocbObject3" id="ocbObject3" value="Boat">
    <label for="olaObjectocb3">checkbox Object [ ocb 3 ]</label><br><br>
</div>
</br>
<div class="form-group">
    <input type="radio" id="orbObjectMale" name="orbObject" value="male">
    <label for="olaObjectorb1">radio Object [ orb 1 ]</label><br>
    <input type="radio" id="orbObjectFemale" name="orbObject" value="female">
    <label for="olaObjectorb2">radio Object [ orb 2 ]</label><br>
    <input type="radio" id="orbObjectOther" name="orbObject" value="other">
    <label for="olaObjectorb3">radio Object [ orb 3 ]</label>
</div>
</br>
<table class="table" id="otbObject" name="otbObject">
    <thead>
        <tr id="otrOject1" name="otrOject1">
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
        </tr>
    </thead>
    <tbody>
        <tr id="otrOject1" name="otrOject1">
            <th scope="row">1</th>
            <td id="otdOjectMark" name="otdOjectMark">Mark</td>
            <td id="otdOjectOtto" name="otdOjectOtto">Otto</td>
        </tr>
    </tbody>
</table>
</br>
<ul class="list-unstyled" id="oulOject" name="oulOject">
    <li class="media" id="oliOject" name="oliOject">
        <div class="media-body">
            <h5 class="mt-0 mb-1">ul li Object [ orb 3 ]</h5>
        </div>
    </li>
</ul>
</br>
<h3> Object [ ocv ]</h3>
<canvas id="ocvObjectCanvas" width="300" height="150" style="border:1px solid #d3d3d3;">
    Object [ ocv ]
</canvas>

<button onclick="obtMyFunction()">Try it</button>

<script>
    function obtMyFunction() {
        var c = document.getElementById("ocvObjectCanvas");
        var ctx = c.getContext("2d");
        ctx.fillStyle = "#FF0000";
        ctx.fillRect(20, 20, 150, 100);
    }
</script>