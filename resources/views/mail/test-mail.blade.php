<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

<style>
@import url('https://fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,600,700|Work+Sans:100,200,300,400,500,600');

:root {
    --headlinesFont: 'Josefin Sans', sans-serif;
    --bodyFont: 'Work Sans', sans-serif;
    --wildWatermelon: #ff4f87;
    --fuelYellow: #f0a035;
    --textColor: #323232;
    --bodyBg: #d6d6d6;
    --white: #fff;
    --black: #000;
}

@mixin poCentering {
    top: 50%;
    right: 50%;
    bottom: 50%;
    left: 50%;
    position: absolute;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

html{
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
html, body {

}
body {
    background: var(--bodyBg);
    font-family: var(--bodyFont);
    color: var(--textColor);
    line-height: 1.5;
}

* {
    -webkit-box-sizing: inherit;
    -moz-box-sizing: inherit;
    box-sizing: inherit;
}

img {
    vertical-align: text-bottom;
}

a {
    color: inherit;
    text-decoration: none;
}

.ft-recipe {
    width: 460px;
    height: 654px;
    background: var(--white);
    display: flex;
    flex-direction: column;
    box-shadow: 0 0 88px 0 rgba(0, 0, 0, 0.1607843137254902);
    overflow: hidden;
    .ft-recipe__thumb {
        position: relative;
        height: 281px;
        box-shadow: 0px 0px 130px 0 rgba(0, 0, 0, 0.38);
        #close-modal {
            position: absolute;
            top: 0; right: 0;
            width: 36px;
            height: 36px;
            background: #000;
            color: var(--white);
            text-align: center;
            line-height: 36px;
            font-size: 22px;
            cursor: pointer;
            z-index: 1;
            transition: all 200ms ease;
            &:hover {
                background: transparent;
                color: var(--black);
            }
        }
        h3 {
            text-align: center;
            position: absolute;
            margin: 0;
            width: 100%;
            color: var(--white);
            font-family: var(--headlinesFont);
            font-size: 25px;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.25), transparent);
            padding: 2.4rem 0 0;
        }
        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: 50% 50%;
        }
    }
    .ft-recipe__content {
        flex: 1;
        padding: 0 2em 1em;
        .content__header {
            .row-wrapper {
                display: flex;
                padding: .55em 0 .3em;
                border-bottom: 1px solid #d8d8d8;
                .recipe-title {
                    font-family: var(--headlinesFont);
                    font-weight: 600;
                }
                .user-rating {

                }
            }
            .recipe-details {
                display: flex;
                list-style: none;
                padding: 1.4em 0 1em;
                margin: 0;
                justify-content: space-between;
                .recipe-details-item {
                    flex: 1;
                    i {
                        font-size: 30px;
                    }
                    .value {
                        color: #ff4f87;
                        margin-left: .35em;
                        vertical-align: bottom;
                        font: {
                            size: 24px;
                            weight: 600;
                        }
                    }
                    .title {
                        display: block;
                        margin-top: -4px;
                        font: {
                            family: var(--headlinesFont);
                            size: 21px;
                            weight: 300;
                        }
                    }
                }
            }

        }
        .description {
            margin: .3em 0 1.8em;
        }
        .content__footer {
            text-align: center;
            margin: 0 3rem;
            a {
                font-family: var(--headlinesFont);
                display: inline-block;
                background: var(--wildWatermelon);
                padding: .45em 1em;
                width: 100%;
                text-align: center;
                border-radius: 5px;
                color: #fff;
                font-weight: 500;
                letter-spacing: .2px;
                font-size: 17px;
                transition: transform 250ms ease,
                            box-shadow 250ms ease;
                &:hover {
                    transform: translateY(-3px);
                    box-shadow: 0 10px 34px 0 rgba(255, 79, 135, 0.32);
                }
            }
        }
    }

}
</style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

        <div class="ft-recipe"> 
          <div class="ft-recipe__thumb"><span id="close-modal"><i class="ion ion-md-close"></i></span>
            <h3>Tahniah! Permohonan Anda Diluluskan</h3><img src="https://zippypaws.com/app/uploads/2018/05/strawberry-waffles-1024x668.jpg" alt="Strawberry Waffle"/>
          </div>
          <div class="ft-recipe__content">
            <header class="content__header">
              <div class="row-wrapper">
                <h2 class="recipe-title">{{$name}}</h2>
                <div class="user-rating"></div>
              </div>
              <!--<ul class="recipe-details">
                <li class="recipe-details-item time"><i class="ion ion-ios-clock-outline"></i><span class="value">20</span><span class="title">Minutes</span></li>
                <li class="recipe-details-item ingredients"><i class="ion ion-ios-book-outline"></i><span class="value">5</span><span class="title">Ingredients</span></li>
                <li class="recipe-details-item servings"><i class="ion ion-ios-person-outline"></i><span class="value">4-6</span><span class="title">Serving</span></li>
              </ul>-->
            </header>
            <p class="description">
               Tahniah {{$name}}, Permohonan Anda Telah Diluluskan</p>
            <footer class="content__footer"><a href="#"></a></footer>
          </div>
        </div>

</div>
</body>