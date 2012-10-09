
    
        <table>
            <tr>
                <td class="w100">Tiêu đề</td>
                <td colspan="3">
                    <div class="pr10">
                        <input id="Title" type="text"  class="classic-input w100pc"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="w100">Hình ảnh</td>
                <td colspan="3">
                    <div class="pr10">
                        <input id="Thumbs" type="text"  class="classic-input w100pc" placeholder="Tự động lấy từ video ( YouTube )"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="w100">Danh mục</td>
                <td class="w320">
                    <select id="Category" class="classic-select w100pc">
                        <option>Music</option>
                    </select>
                </td>
                <td class="pl60 w100">Nguồn</td>
                <td class="w320">
                    <select id="Source" class="classic-select w100pc">
                        <option>YouTube</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="w100">Danh mục</td>
                <td class="w320">
                    <div class="Categorys">
                    <input type="checkbox" value="Music"/><label>Music</label>
                    <input type="checkbox" value="Funny"/><label>Funny</label>
                    <input type="checkbox" value="Game"/><label>Game</label>
                    </div>
                </td>
                <td class="pl60 w100">Nguồn</td>
                <td class="w320">
                    <div class="pr10">
                        <input type="text"  class="classic-input w100pc"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="w100">Ghi chú</td>
                <td class="w320">
                    <div class="pr10">
                        <textarea id="Description" class="classic-input w100pc rsv"></textarea>
                    </div>
                </td>
                <td class="pl60 w100">Tag</td>
                <td class="w320">
                    <div class="pr10">
                        <textarea id="Tag" class="classic-input w100pc rsv"></textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="w100">Mã nhúng</td>
                <td colspan="3">
                    <div class="pr10">
                        <textarea id="Embel" class="classic-input w100pc rsv"></textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="w100"></td>
                <td colspan="3">
                    <input type="checkbox"/><label>Xem trước</label>
                    <div style="min-height:  200px;background: #ddd"></div>
                </td>
            </tr>
        </table>

    <div>
        <input type="button" class="classic-button" value="Trở về" onclick="jqxGrid.CancelEditVideo();"/>
        <input type="button" class="classic-button" value="Thêm" onclick="jqxGrid.SaveVideo();"/>
        <input type="button" class="classic-button" value="Cập nhật" onclick="jqxGrid.CancelEditVideo();"/>
    </div>
