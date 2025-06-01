document.addEventListener("DOMContentLoaded", function () {

    const videos = document.querySelectorAll(".video")
    videos.forEach((video) => {
        video.addEventListener("click", () => {
            video.querySelector("video").pause()
            if (!video.dataset.url) return;
            const youtube_video_container = document.createElement("div")
            youtube_video_container.id = "youtube_video"
            const video_container = document.createElement("div")
            video_container.classList.add("w-10/12")

            const iframe = document.createElement("iframe")
            iframe.classList.add("w-full", "aspect-video")
            iframe.title = "YouTube video player"
            iframe.frameborder = "0"
            iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            iframe.allowfullscreen = true
            iframe.src = video.dataset.url
            video_container.appendChild(iframe)


            youtube_video_container.appendChild(video_container)

            document.body.appendChild(youtube_video_container)
            youtube_video_container.addEventListener("click", (event) => {
                if (!video_container.contains(event.target)) {
                    video.querySelector("video").play()
                    youtube_video_container.remove()
                }
            })

        })
        video.addEventListener("mouseenter", () => {
            video.querySelector("video").play()
        })
        video.addEventListener("mouseleave", () => {
            video.querySelector("video").pause()
        })
    })

})