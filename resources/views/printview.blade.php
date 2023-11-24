    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Timeline</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            * {
                box-sizing: border-box;
            }

            /* Set a background color */
            body {
                background-color: #E5E7EB;
                font-family: Helvetica, sans-serif;
            }

            /* The actual timeline (the vertical ruler) */
            .timeline {
                position: relative;
                max-width: 500px;
                margin: 0 auto;
            }

            /* The actual timeline (the vertical ruler) */
            .timeline::after {
                content: '';
                position: absolute;
                width: 6px;
                background-color: white;
                left: 50%;
                margin-left: -3px;
            }

            /* Container around content */
            .container {
                padding: 10px 40px;
                position: relative;
                background-color: inherit;
                width: 50%;
            }

            /* Place the container to the left */
            .left {
                left: -18%;
            }

            /* Place the container to the right */
            .right {
                left: 50%;
            }

            /* Add arrows to the left container (pointing right) */
            .left::before {
                content: " ";
                height: 0;
                position: absolute;
                top: 22px;
                width: 0;
                z-index: 1;
                right: 30px;
                border: medium solid white;
                border-width: 10px 0 10px 10px;
                border-color: transparent transparent transparent white;
            }

            /* Add arrows to the right container (pointing left) */
            .right::before {
                content: " ";
                height: 0;
                position: absolute;
                top: 22px;
                width: 0;
                z-index: 1;
                left: 30px;
                border: medium solid white;
                border-width: 10px 10px 10px 0;
                border-color: transparent white transparent transparent;
            }


            /* The actual content */
            .content {
                padding: 20px 30px;
                background-color: white;
                position: relative;
                border-radius: 6px;
            }

            /* Media queries - Responsive timeline on screens less than 600px wide */
            @media screen and (max-width: 600px) {
                /* Place the timelime to the left */
                .timeline::after {
                    left: 31px;
                }

                /* Full-width containers */
                .container {
                    width: 100%;
                    padding-left: 70px;
                    padding-right: 25px;
                }

                /* Make sure that all arrows are pointing leftwards */
                .container::before {
                    left: 60px;
                    border: medium solid white;
                    border-width: 10px 10px 10px 0;
                    border-color: transparent white transparent transparent;
                }

                /* Make sure all circles are at the same spot */
                .left::after, .right::after {
                    left: 15px;
                }

                /* Make all right containers behave like the left ones */
                .right {
                    left: 0%;
                }
            }
        </style>
    </head>
    <body>
    <h1 style="text-align: center">TIMELINE</h1>
    <div class="timeline">
        <!-- Container -->
            @foreach($events as $event)
                @if($loop->iteration % 2 != 0)
                      @php($position = 'container left')
                @else
                    @php($position = 'container right')
                @endif
                <div class="{{ $position }}">
                    <div class="content">
                        <h2>{{ $event->title }}</h2>
                        <p>{{$event->start_date}}</p>
                        <p>{{$event->description}}</p>
                    </div>
                </div>
            @endforeach
    </div>
    </body>
    </html>
