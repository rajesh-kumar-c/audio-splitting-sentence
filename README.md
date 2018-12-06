# audio-splitting-sentence
Split the single audio into multiple based on sentence

This is used to cut the audio based on sentences spoken in the audio.
It can be used for all language audios.
I have used the FFMPEG PHP Library.
Logic behind this is, we read the audio file and taken the silence time. 
Upon completion of each sentence, we will have some silence to denote the sentence has been completed.
So we have taken the silence start time, silence end time and cut the audio.
Thanks
Rajesh
