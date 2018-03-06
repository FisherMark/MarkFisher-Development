using System;
using System.Threading;

namespace Events
{
    public class VideoEventArgs : EventArgs
    {
        public Video Video { get; set; }
    }
    public class VideoEncoder
    {
        // 1-Define a delegate
        // 2-Define an event based on that delegate
        // 3-Raise the event

        //EventHandler
        //EventHandler<TEventArgs>

        public event EventHandler<VideoEventArgs> VideoEncoded;
        //public event EventHandler VideoEncoded;

        public void Encode(Video video)
        {
            Console.WriteLine("Encoding video...");
            Thread.Sleep(3000);

            OnVideoEncoded(video);
        }

        protected virtual void OnVideoEncoded(Video video)
        {
            VideoEncoded?.Invoke(this, new VideoEventArgs() { Video = video});
        }
    }
}
