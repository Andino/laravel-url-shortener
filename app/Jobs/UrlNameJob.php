<?php

namespace App\Jobs;

use App\Models\Url;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UrlNameJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected $urlRecord;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($urlRecord)
    {
        $this->urlRecord = $urlRecord;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $url = Url::find($this->urlRecord);
        $site = file_get_contents($url->url);
        $title = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $site, $match) ? $match[1] : null;
        if (!empty($site)) {
            $url->title = $title;
            $url->save();
        }
    }
}
