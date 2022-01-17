<div class="header">
    <div class="flex-row header-item header-home" onclick="document.location.href='/home'">
        <img class="btnHome" src="/files/img/Logo.jpg" alt="logo"/>
        <h3 class="title">De Gezondheidsmeter</h3>
    </div>
    <div class="header-buttons-pc">
        <?php
        $Meter = new Meter();
        if (!$Meter->checkToday()) {
            echo '<div class="header-item"><a class="header-link rounded" href="/daily">Dagelijkse test maken</a></div>';
        } else {
            echo '<div class="rounded test-made">U heeft de dagelijkse test al gemaakt</div>';
        }
        ?>
        <div class="header-item">
            <a class="header-link rounded" href="/logout">Uitloggen</a>
        </div>
    </div>
</div>
<div class="header-buttons-phone">
    <div id="header-burger-container" class="header-burger-container">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </div>
</div>
<div id="header-buttons-screen" class="header-buttons-screen">
    <a class="header-link-phone" href="/start">Start</a>
    <?php
    $Meter = new Meter();
    if (!$Meter->checkToday()) {
        echo '<a class="header-link-phone" href="/daily">Test maken</a>';
    }
    ?>
    <a class="header-link-phone" href="/logout">Uitloggen</a>

    <div class="header-buttons-phone">
        <div id="header-burger-container-close" class="header-burger-container">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
    </div>
</div>