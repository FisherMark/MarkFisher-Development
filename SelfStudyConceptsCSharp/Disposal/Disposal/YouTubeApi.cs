using System;
using System.Collections.Generic;

namespace Disposal
{
    public class YouTubeApi
    {
        public List<Video> GetVideos(string user)
        {
            try
            {
                //Access Youtube web service
                //Read the data
                //Create a list of Video objects
                throw new Exception("Oops some low level YouTube error.");
                //this becomes the innerexception
            }
            catch (Exception ex)
            {
                //Log

                throw new YouTubeException("Could not fetch the videos from YouTube.", ex);
            }

            return new List<Video>();
        }
    }
}
