<?php require 'modules/header.php'; ?>


<div class="container col-10">
        <h1 align="center" class="display-1"> Hey, 't's Dan.</h1>
        <div class="d-flex bd-highlight mb-5">
            <img class="img-thumbnail" id="pic" src="maya.jpg" width="300px">
            <div class="p-2 flex-grow-1 bd-highlight ml-2">
                <h2> Chi sono? </h2>
                <p>Un fallito. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tincidunt lacus ac
                    leo
                    egestas
                    vulputate. Donec eget mattis purus, consequat finibus nisi. Vivamus id convallis augue. Nunc
                    vehicula
                    lectus
                    sem, a luctus ipsum interdum ut. Mauris elit eros, fermentum at bibendum eget, malesuada sed
                    lacus. Duis
                    aliquam
                    placerat erat, at hendrerit eros aliquet at. Pellentesque hendrerit vehicula ex, ut rutrum eros
                    egestas
                    a.
                    Praesent commodo convallis nunc eu aliquet. Suspendisse at urna sit amet velit tincidunt
                    vehicula. In
                    tincidunt
                    eleifend justo, in cursus lacus cursus ac. Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit.
                    Aenean
                    efficitur porttitor laoreet. Vivamus sollicitudin, orci eleifend ultrices scelerisque, libero
                    tortor
                    commodo
                    magna, ut rutrum massa metus non ligula.</p>
            </div>
        </div>
        <h2>Ciao!</h2>
        <div class="table-responsive">
            <table class="table" id="orario">
                <caption>ORARIO</caption>
                <thead>
                    <tr>
                        <td scope="col">#</td>
                        <th scope="col">Lunedì</th>
                        <th scope="col">Martedì</th>
                        <th scope="col">Mercoledì</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="justify-center" scope="col" rowspan="4">Materia</th>
                        <td scope="col">Arte</td>
                        <td scope="col">Matematica</td>
                        <td scope="col">Francese</td>
                    </tr>
                    <tr>
                        <td scope="col">Fisica</td>
                        <td scope="col">Chimica</td>
                        <td scope="col">Latino</td>
                    </tr>
                    <tr>
                        <td scope="col">Storia</td>
                        <td scope="col">Motoria</td>
                        <td scope="col" rowspan="2">Italiano</td>
                    </tr>
                    <tr>
                        <td scope="col">Filosofia</td>
                        <td scope="col">Religione</td>
                    </tr>
                </tbody>
            </table>
        </div>
</body>

<?php require 'modules/footer.php'; ?>