<!-- resources/views/mail/new_message.blade.php -->

@extends('layouts.mail')

@section('css')
<style>
    a.button{
        color:black;
        border:1px solid black;
        padding: 5px 10px;
        border-radius: 10px;
    }

</style>
@endsection

@section('content')
    <table class="message-container" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td class="message-content">
                <h1>新消息通知第五版</h1>
                <p>這是新消息的內容。</p>
                
                <p>
                    <a href="{{ $url }}" class="button">查看消息</a>
                </p>
                
                <p>感謝您使用我們的應用程式！</p>
            </td>
        </tr>
    </table>
@endsection
