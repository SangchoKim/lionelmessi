# Lionel Messi 팬 페이지

> 개인프로젝트

> Lionel Messi의 커리어, 뉴스(인스타 방식), 상점(유니폼, 스타킹, 축구화)을 포함한 팬 페이지 

![Tech%2Fframework%20used-php-red](https://img.shields.io/badge/Tech%2Fframework%20used-php-red.svg)
![Tech%2Fframework%20used-codeIgniter-yellow](https://img.shields.io/badge/Tech%2Fframework%20used-codeIgniter-yellow.svg)
![version-0.0.1-blue](https://img.shields.io/badge/version-0.0.1-blue)

![ezgif com-video-to-gif](https://user-images.githubusercontent.com/36231361/66094508-34e62600-e5cf-11e9-859b-4a2884afeea7.gif)


## 스크린샷 & 기능 

### <Login, SignUp>

![그림1](https://user-images.githubusercontent.com/36231361/66095697-711b8580-e5d3-11e9-928a-40588286300a.png)
![그림2](https://user-images.githubusercontent.com/36231361/66095698-711b8580-e5d3-11e9-94ac-ab8666c5e493.png)

- 팝업창 사용하여 회원가입 창 구성  
- 메인 페이지로 접속하기 전 해당 로그인 필수

### <비밀번호 찾기>

![그림3](https://user-images.githubusercontent.com/36231361/66096013-83e28a00-e5d4-11e9-8a52-99f281b5cf50.png)
![그림4](https://user-images.githubusercontent.com/36231361/66096010-8349f380-e5d4-11e9-9937-52ba7c7680fd.png)
![그림5](https://user-images.githubusercontent.com/36231361/66096011-83e28a00-e5d4-11e9-8aab-b8359882a76e.png)
![그림6](https://user-images.githubusercontent.com/36231361/66096012-83e28a00-e5d4-11e9-9e4f-c518c7df976d.png)

- Mailing 기능 추가 
- 비밀번호 찾기 기능 총 3단계(Mailing -> SecretCode -> UpdatePw)로 구성

### <ABOUT>

![그림7](https://user-images.githubusercontent.com/36231361/66096184-2569db80-e5d5-11e9-8bab-1c2103e176ef.png)
![그림8](https://user-images.githubusercontent.com/36231361/66096182-2569db80-e5d5-11e9-88d2-e5f2cd807b3f.png)
![그림9](https://user-images.githubusercontent.com/36231361/66096183-2569db80-e5d5-11e9-8bf3-382cbb2237df.png)

- Lionel Messi 선수의 커리어를 보여주는 공간

### <News>

![그림21](https://user-images.githubusercontent.com/36231361/65931781-10ab0d80-e446-11e9-9035-bd2bac02cbc6.png)
![그림22](https://user-images.githubusercontent.com/36231361/65931783-1143a400-e446-11e9-84da-120392ec37db.png)

- 커플 중 한명이 이벤트를 일으켰을 경우, 알림창 페이지 상단에 나타남 
- 알림 갯수, 알림 버튼 옆 추가(현재 업데이트중)

### <배경화면>

![그림23](https://user-images.githubusercontent.com/36231361/65931941-a3e44300-e446-11e9-86ca-363ab65bfc59.png)

- 커플들의 메인 화면 공간을 카메라&앨범 기능을 사용하여 취향대로 꾸밀 수 있는 환경 조성  

### <기념일>

![그림24](https://user-images.githubusercontent.com/36231361/65932055-12c19c00-e447-11e9-8278-e59c70e95987.png)

- 커플들만의 기념일 공유 공간
- 기념일 추가(현재 업데이트중)

### <캘린더>

![그림25](https://user-images.githubusercontent.com/36231361/65932343-3df8bb00-e448-11e9-94ae-252037d61b18.png)
![그림26](https://user-images.githubusercontent.com/36231361/65932344-3df8bb00-e448-11e9-9c22-1830bf30ac8f.png)
![그림28](https://user-images.githubusercontent.com/36231361/65932346-3e915180-e448-11e9-8828-60f5b3399329.png)
![그림27](https://user-images.githubusercontent.com/36231361/65932345-3df8bb00-e448-11e9-996d-463596b5536d.png)
![그림29](https://user-images.githubusercontent.com/36231361/65932347-3e915180-e448-11e9-9426-10024c92a0ce.png)

- 커플들만의 추억을 만들어 나갈 수 있는 계획 및 일정을 공유하는 공간 
- CRUD 기능 추가

### <로딩>

![그림30](https://user-images.githubusercontent.com/36231361/65932450-b52e4f00-e448-11e9-85c0-046b6e8d0066.png)

- CSR의 단점을 극복하기 위해 Server에 접근할 때 Loading 창 보여줌

## 개발 환경 
![stack](https://user-images.githubusercontent.com/36231361/65934010-bebab580-e44e-11e9-98fa-89ca56142496.png)

## API Reference

#### <Login, SignUp>
- Passport -> 로그인 기능 구현
- Flash -> 로그인 실패시

#### <공유 앨범>
- Multer -> 이미지 파일 저장
- LightBox -> 이미지 확대
- imageEncoder -> 이미지 인코더
- Cropper -> 이미지 자르기
- WebCam -> 카메라 
- InfiniteScroll -> 페이지네이션 

#### <채팅>
- Peer js + Sokect.io -> 화상통화 
- Sokect.io -> 통신
- Lottie -> 이모티콘
- Player -> 동영상
- imageEncoder -> 이미지 인코더
- Uuid -> 고유 값
- Multer -> 이미지 파일 저장
- WebCam -> 카메라  
- ReactMics -> 녹음
- InfiniteScroll -> 페이지네이션

#### <알림>
- Sokect.io -> 통신
- InfiniteScroll -> 페이지네이션

#### <배경화면>
- Multer -> 이미지 파일 저장
- WebCam -> 카메라

#### <기념일>
- Moment -> 기념일 계산

#### <캘린더>
- DataPicker -> 달력
- TimeInputLiv-> 시간
- DataRangePicker -> 날짜 
 
## 업데이트 내역

* 0.1.0
    * 출시 예정(릴리즈 예정)
* 0.0.1
    * 작업 진행 중

## 정보

김상초 – [wjdrms1919@gmail.com] 

MIT © LICENSE를 준수하며 ``MITLICENSE``에서 자세한 정보를 확인할 수 있습니다.

Github - [https://github.com/SangchoKim/younme]

Page - 릴리즈 준비중

## 기여 방법

- 준비중입니다. 

