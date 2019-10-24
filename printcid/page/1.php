<div class="frambody">I. <label>ព័ត៍មានលម្អិតអតិថិជន</label>​ / APPLICATION DETAILS</div>
        <table class="table" style="width:100%">
            <tr>
              <td width="30%"><label>សូមគូស <input type="checkbox" checked="checked"/> នៅក្នុងប្រអប់</label>
                    <br/>Please tick in box
              </td>
              <td width="30%"><label><input type="checkbox" /> អតិថិជនថ្មី</label>
                    <br/>New Customer
              </td>
              <td width="30%"><label><input type="checkbox" /> អតិថិជនចាស់ ឬការធ្វើបច្ចុប្បន្នភាពបុគ្គល</label>
                    <br/>Existing Customer or other information update
              </td>  
           </tr>
        </table>
        <div class="detail"> 
         <div class="title">1.<label>ព័ត៏មានបុគ្គល</label> / Personal Detail</div>
              <table class="table"  style="width:100%">
                 <tr>
                   <td width="50%"><label>នាមត្រគោល :</label>
                       <input type="text" class="form-control" style=" width:370px;" name="fam_name" value="<?php echo $parts[1]; ?>">
                       <br/>Family Name​
                   </td>
                   <td width="50%"><label>នាមខ្លួន :</label>
                        <input type="text" class="form-control" style=" width:395px;" name="fir_name" value="<?php echo $parts[0]; ?>">
                        <br/>First Name
                   </td>  
                </tr>
              </table>
              <table class="table"  style="width:100%">
                <tr>
                  <td width="30%"><label>ថ្ងៃខែឆ្នាំកំណើត :</label>
                      <input type="text" class="form-control" style=" width:185px;" name="dob" value="<?php echo $parts[2]; ?>">
                      <br/>Date of Birth
                  </td>
                  <td width="30%"><label>ភេទ :</label>
                      <input type="text" class="form-control" style=" width:185px;" name="gender" value="<?php echo $parts[3]; ?>">
                      <br/>Gender
                  </td>
                  <td width="30%"><label>សញ្ជាតិ :</label>
                      <input type="text" class="form-control" style=" width:185px;" name="national" value="<?php echo $parts[7]; ?>">
                      <br/>Nationality
                  </td>  
                </tr>
              </table>
              <table class="table" style="width:100%">
                <tr>
                  <td width="60%"><label>ទីកន្លែងកំណើត :</label>
                     <input type="text" class="form-control" style=" width:400px;" name="cob" value="<?php echo $shortadd; ?>">
                     <br/>Place Of Birth :
                  </td>
                  <td width="30%"><label>ប្រទេសកំណើត :</label>
                     <input type="text" class="form-control" style=" width:180px;" name="cob" value="<?php echo $parts[6]; ?>">
                     <br/>Country of Birth :
                  </td>  
                </tr>
              </table>
              <table class="table" style="width:100%">
                 <tr>
                    <td width="30%"><label>ស្ថានភាពគ្រួសារ​ :</label>
                      <input type="text" class="form-control" name="marital" value="<?php echo $parts[4]; ?>">
                      <br/>Marital Status:
                    </td>
                    <td width="30%"><label>លិខិតសំគាល់ខ្លួន :</label>
                      <input type="text" class="form-control" name="legalID" value="<?php echo $parts[8]; ?>">
                      <br/>Type of Legal :
                    </td>
                    <td width="30%"><label>លេខ : </label>
                      <input type="text" class="form-control" style=" width:245px;"  name="legalN" value="<?php echo $parts[10]; ?>">
                      <br/>Number
                    </td>  
                 </tr>
                 <tr>
                    <td width="30%"><label>ប្រទេសចេញប័ណ្ណ : </label>
                      <input type="text" class="form-control" style=" width:160px;" name="IssueCountry" value="<?php echo $parts[9]; ?>">
                      <br/>Issuing Country
                    </td>
                    <td width="30%"><label>ថ្ងៃចេញប័ណ្ណ : </label>
                      <input type="text" class="form-control" style=" width:198px;" name="IssueDate" value="<?php echo $parts[11]; ?>">
                      <br/>Issue Date 
                    </td>
                    <td width="30%"><label>ថ្ងៃផុតកំណត់ : </label>
                      <input type="text" class="form-control" style=" width:198px;" name="ExpireDate" value="<?php echo $parts[12]; ?>">
                      <br/>Expire Date 
                    </td>  
                 </tr>
             </table>
             <table class="table"  style="width:100%">
                 <tr>
                    <td width="100%"><label>អាសយដ្ឋានបច្ចុប្បន្ន :</label>
                      <input type="text" class="form-control" style=" width:818px;" name="crraddress" 
                           value="<?php echo $address; ?>">
                            <br/>Current Address
                    </td>
                 </tr>
                 <tr>
                    <td width="100%"><label>អាសយដ្ឋានអចិន្ត្រៃ :</label>
                      <input type="text" class="form-control" style=" width:823px;" name="peraddress" 
                           value="">
                            <br/>Permanent Address
                    </td>
                 </tr>
            </table>
            <table class="table"  style="width:100%">
                 <tr>
                    <td width="30%"><label>លេខកូដប្រទេស :</label>
                      <input type="text" style=" width:185px;" class="form-control" name="countrycode" required>
                      <br/>Country Code
                    </td>
                    <td width="30%"><label>លេខទូរស័ព្ទ :</label>
                      <input type="text" style=" width:185px;" class="form-control" name="phone" value="<?php echo $parts[21]; ?>">
                      <br/>Phone Number
                    </td>
                    <td width="30%"><label>អ៊ីម៉ែល :</label>
                      <input type="text" style=" width:200px;" class="form-control" name="email" value="<?php echo $parts[20]; ?>">
                      <br/>Email Address
                    </td>  
                 </tr>
              </table>
              <div class="title">2.<label>ព័ត៏មានលម្អិតអំពីមុខរបរ :</label> / Employment Detail </div>
              <table class="table"  style="width:100%">
                 <tr>
                   <td width="50%"><label>ឈ្មោះអង្គភាព :</label>
                       <input type="text" class="form-control" style=" width:300px;" name="institut" value="<?php echo $parts[23]; ?>">
                       <br/>Institution name
                  </td>
                  <td width="50%"><label>មុខងារ :</label>
                       <input type="text" class="form-control" style=" width:380px;" name="position" value="<?php echo $parts[24].','.$parts[36];?>">
                       <br/>Occupation
                  </td>  
                </tr>
                <tr>
                  <td width="50%"><label>អាសយដ្ឋានអង្គភាព :</label>
                       <input type="text" class="form-control" style=" width:300px;" name="insadd" value="<?php echo $parts[25];?>">
                       <br/>Institution Address
                  </td>
                  <td width="50%"><label>ប្រភេទអាជីវកម្ម :</label>
                       <input type="text" style=" width:280px;" class="form-control" name="tob" value="<?php echo $parts[22]; ?>">
                       <br/>Type of Business
                  </td>  
                </tr>
              </table>
              <div class="title">3.<label>ប្រភពប្រាក់ចំណូល និងធនាគារ</label> / Income and Banking</div>
              <table class="table" style="width:100%">
                 <div class="title s"><label>ប្រភពប្រាក់ចំណូលចម្បង</label> / Primary Soucre of Income</div>
                 <tr>
                   <td width="25%"><div class="form-control">
                   <input type="checkbox"​ checked="checked" /> From : <?php echo $parts[26]; ?></div></td>
                   <td width="25%"></td>
                   <td width="25%"></td>  
                   <td width="25%"></td>
                 </tr>
              </table>
              <table class="table" style="width:100%">
                 <div class="title s"><label>គោលបំណងនៃកាប្រើរសេវាកម្មធនាគារ</label> / Purpose of Banking Service</div>
                 <tr>
                    <td width="25%"><div class="form-control">
                                     <input type="checkbox" checked="checked"/> For : <?php echo $parts[28]; ?></div></td>
                    <td width="25%"></td>
                    <td width="25%"></td>  
                    <td width="25%"></td>
                 </tr>
              </table>
                 <div class="title">4.<label>សេចក្តីប្រកាសសម្រាប់អនុវត្ត</label> / FATCA / FATCA Certification</div>
              <table class="table"  style="width:100%">
                 <tr>
                    <td width="70%"><label><input type="checkbox" <?php echo $yes; ?> /> បាទ-ចាស</label>/Yes: USTIN :
                        <input type="text" style=" width:280px;" class="form-control" id="ustin" name="ustin" value="<?php echo $code; ?>"><br/>
                        <label>ទម្រង់ FATCA លើកលែងកូដ(ប្រសិនបើមាន)</label> :
                        <input type="text" style=" width:280px;" class="form-control" name="ustin_code" value="<?php  echo $parts[37]; ?>">
                        <br/> FATCA Exemption Code (if any)
                    </td>
                    <td width="30%"><!--<label>ទម្រង់ FATCA លើកលែងកូដ(ប្រសិនបើមាន)</label> :
                        <input type="text" style=" width:183px;" class="form-control" name="ustin_code">
                        <br/> FATCA Exemption Code (if any)-->
                    </td>  
                 </tr>
              </table>
              <table class="table" width="100%">
                 <tr with="90%">
                   <td width="95%"><label class="ct">ខ្ញុំជាពលរដ្ឋអាមេរិកាំងអ្នកស្រុក អ្នករស់នៅជាអចិន្រ្តៃយ៍អ្នកកាន់ ប័ណ្ណបៃតង ឬ អ្នកបង់ពន្ធអាមេរិកដោយហេតុផល ថាមានវត្តមានរាងកាយច្រើន នៅសហរដ្ឋអាមេរិក ឬ ហេតុផលផ្សេងទៀត។</label><p style=" font-size:16px; margin-bottom:3px; margin-top:3px;">I am a United States (US) citizen, resident, permanent resident, green card holder or US tax payer by reason of having substantial physical. presence in the US or any other reason.</p>
                   </td>
                 </tr>
                 <tr with="90%">
                   <td width="95%"><label class="ct"> <input type="checkbox" <?php echo $no; ?> /> ទេខ្ញុំ / យើងសូមបញ្ជាក់ថាខ្ញុំមិនមែនជាកម្មវត្ថុចំពោះការដកហូតប្រាក់បម្រុងពីសហរដ្ឋអាមេរិកទេពីព្រោះ៖ (ក) ខ្ញុំ / យើងត្រូវបានរួចផុតពីការដកហូតប្រាក់បម្រុងទុករបស់សហរដ្ឋអាមេរិកឬ (ខ) ខ្ញុំ / យើងមិនបានត្រូវបានជូនដំណឹងដោយសេវាកម្មប្រាក់ចំណូលផ្ទៃក្នុង (IRS) ទេ។ ថាខ្ញុំ / យើងស្ថិតក្រោមការដកហូតការបម្រុងទុករបស់សហរដ្ឋអាមេរិកដែលជាលទ្ធផលនៃការខកខានមិនបានរាយការណ៍ពីការប្រាក់ឬភាគលាភទាំងអស់ឬ (c) IRS បានជូនដំណឹងខ្ញុំថាខ្ញុំ / យើងមិនមែនជាកម្មវត្ថុនៃការដកហូតបម្រុងទុករបស់សហរដ្ឋអាមេរិកទៀតទេ។ ខ្ញុំទទួលស្គាល់និងដឹងថាខ្ញុំនឹងជូនដំណឹងទៅធនាគារក្នុងរយៈពេល 30 ថ្ងៃបន្ទាប់ពីការផ្លាស់ប្តូរស្ថានភាពរបស់ខ្ញុំ។</label> <p style=" font-size:16px;margin-bottom:3px; margin-top:3px;">No, I/we certify that I am not subject to U.S. backup withholding because: (a) I am/we are exempt from U.S. backup withholding, or (b) I/we have not been notified by the Internal Revenue Service (IRS) that I am/we are subject to U.S. backup withholding as a result of a failure to report all interest or dividends, or (c) the IRS has notified me that I am/we are no longer subject to U.S. backup withholding. I acknowledge and aware that I will notify to the bank within 30 days of any change to my status.</p>
                   
                  </td>
                  
                </tr>
             </table>
             <div style="margin-bottom:20px;"></div>
     </div>