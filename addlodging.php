<?php
$rooms = $conn->query("SELECT * FROM `room` GROUP BY room.ID");
$guests = $conn->query("SELECT * FROM `guest` GROUP BY guest.ID");
?>

<h2>Добавить Проживание</h2>
<form action="insertlodging.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Выбор гостя:</label>
        <select class="form-select" name="guest_id">
            <option value="">Выбор гостя</option>
            <?php foreach ($guests as $guest): ?>
                <option value="<?= $guest['id'] ?>"><?= $guest['full_name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Выбор комнаты:</label>
        <select class="form-select" name="room_id" id="room_id" onchange="updateMaxPeople()">
            <option value="">Выбор комнаты</option>
            <?php foreach ($rooms as $room): ?>
                <option value="<?= $room['id'] ?>" data-amount-places="<?= $room['amount_places'] ?>"><?= 'Номер: ' . $room['room_number'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Начало проживания</label>
        <input type="date" class="form-control" name="start_date">
        <div class="form-text">Введите дату начала проживания (формат ДД.ММ.ГГГГ)</div>
    </div>

    <div class="mb-3">
        <label class="form-label">Конец проживания</label>
        <input type="date" class="form-control" name="end_date">
        <div class="form-text">Введите дату конца проживания (формат ДД.ММ.ГГГГ)</div>
    </div>

    <div class="mb-3">
        <label class="form-label">Количество гостей</label>
        <select class="form-select" name="amount_people" id="amount_people">
            <option value="">Выбор количества гостей</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Добавить</button>
</form>

<script>
    function updateMaxPeople() {
        var roomSelect = document.getElementById('room_id');
        var amountPeopleSelect = document.getElementById('amount_people');
        var selectedRoom = roomSelect.options[roomSelect.selectedIndex];
        var maxPeople = selectedRoom.getAttribute('data-amount-places');

        // Clear previous options
        amountPeopleSelect.innerHTML = '<option value="">Выбор количества гостей</option>';

        if (maxPeople) {
            for (var i = 1; i <= maxPeople; i++) {
                var option = document.createElement('option');
                option.value = i;
                option.text = i;
                amountPeopleSelect.appendChild(option);
            }
        }
    }
</script>
