using System;

namespace Disposal
{
    public class YouTubeException : Exception
    {
        public YouTubeException(string message, Exception innerException)
            :base(message, innerException)
        {
        }
    }
}
